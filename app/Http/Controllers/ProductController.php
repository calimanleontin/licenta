<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comments;
use App\Orders;
use App\ProductsLikes;
use App\ProductView;
use App\Stats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Products;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $products = Products::where('active',1)->paginate(9);
        $organizer = [];
        $group = [];
        $nr = 0;
        foreach ($products as $product){
            $group[] = $product;
            $nr ++ ;
            if($nr == 3)
            {
                $organizer[] = $group;
                $group = [];
                $nr = 0;
            }
        }
        if($nr != 0)
            $organizer[] = $group;
        ($organizer);
        $categories = Categories::all();
        return view('home-shop')
            ->withOrganizer($organizer)
            ->withProducts($products)
            ->withCategories($categories);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $categories = Categories::all();
        if($request->user()->can_create_category())
            return view('product.create')->withCategories($categories);
        return redirect('/')->withErrors('You have not sufficient permissions to add a new product');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $categories = $request->input('category');
        $name = $request->input('name');
        $duplicate = Products::where('name',$name)->first();

        $description = $request->input('description');
        $price = $request->input('price');
        $user_id = $request->user()->id;
        $product = new Products();
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->quantity = $request->input('quantity');
        $product->author_id = $user_id;
        $product->likes = 0;
        $product->slug = str_slug($request->input('name'));
        $product->active = 1;

        if(Input::file('image') != null) {
            $destinationPath = 'images/catalog'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $product->image = $fileName;
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        }
        if($duplicate)
            return redirect('/product/create')
                ->withErrors('The name already exists')
                ->withProduct($product);
        $product->save();

        if($categories)
            foreach($categories as $category)
            {
                $category = Categories::where('title',$category)->first();
                $product->categories()->attach($category->id);
            }

        $stats = new Stats();
        $stats->perception = Input::get('perception');
        $stats->strength = Input::get('strength');
        $stats->charisma= Input::get('charisma');
        $stats->endurance= Input::get('endurance');
        $stats->intelligence= Input::get('intelligence');
        $stats->luck = Input::get('luck');
        $stats->save();
        $product->stats_id = $stats->id;
        $product->save();
        return redirect('/backend/products')->withMessage('New product created');
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {
        $product = Products::where('slug',$slug)->first();
        if($product == NULL)
            return redirect('/')->withErrors('Requested url does not exist');
        $comments = Comments::where('on_product',$product->id)->orderBy('created_at','asc')->paginate(5);
        $categories = Categories::all();

        $user = Auth::user();
        if(!empty($user))
        {
            $product_views = ProductView::where('user_id', $user->id)->where('product_id', $product->id)->first();
            if(empty($product_views))
            {
                $product_views = new ProductView();
                $product_views->user_id = $user->id;
                $product_views->product_id = $product->id;
                $product_views->view_number = 0;
            }
            $product_views->view_number += 1;
            $product_views->save();

        }
        return view('product.show')
            ->withProduct($product)
            ->withCategories($categories)
            ->withComments($comments);
    }

    public function edit(Request $request, $id)
    {
        $user = $request->user();
        $product = Products::find($id);
        if($user->id != $product->author_id and $user->is_admin() == false and $user->is_moderator() == false)
            return redirect('/')->withErrors('You have not sufficient permissions ');
        $categories = Categories::all();
        return view('product.edit')->withProduct($product)->withCategories($categories);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        $product = Products::where('id',$id)->first();
        if($user->id != $product->author_id and $user->is_admin() == false and $user->is_moderator() == false)
            return redirect('/')->witheErrors('You have not sufficient permissions ');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $image = Input::file('image');
        $categories = $request->input('category');
        $duplicate = Products::where('name',$name)->first();
        if($duplicate != null and $duplicate->id != $product->id)
            return redirect('/edit/product'.$product->id)->withErrors('The name is already in use');
        if($quantity != null)
            $product->quantity = $quantity;
        if($description != null)
            $product->description = $description;
        if($image != null)
        {
            $destinationPath = 'images/catalog'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;
            $product->image = $fileName;
            Input::file('image')->move($destinationPath, $fileName);
        }
        if ($categories != null)
        {
            $product->categories()->detach();
            foreach($categories as $category)
            {
                $category = Categories::where('title',$category)->first();
                $product->categories()->attach($category->id);
            }
        }
        $product->save();
        return redirect('/product/view/'.$product->slug)->withMessage('Product updated successfully');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $term = $request->get('q');
        $categories = Categories::all();
        $products = Products::where('name','like','%'.$term.'%')->where('active', 1)->paginate(9);
        return view('home-shop')->withProducts($products)
            ->withCategories($categories)
            ->withTerm($term);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sort(Request $request)
    {
        $criterion = $request->get('criterion');
        $order = $request->get('order');
        $categories = Categories::all();
        $products = Products::where('active',1)->orderBy($criterion,$order)->paginate(9);
        return view('home-shop')->withProducts($products)
            ->withTitle('Sort results')
            ->withCategories($categories)
            ->withOrder($order)
            ->withCriterion($criterion);
    }

    public function delete($id)
    {
        if(Auth::guest())
            return redirect('/auth/login')->withErrors('You are not signed in');

        $user = Auth::user();
        if($user->is_admin() == false)
            return redirect('/')->withErrors('You have not rights');

        $product = Products::find($id);
        if(empty($product))
            return redirect('/backend/products')
                ->withErrors('404');

        if($product->hero)
            return redirect('/backend/products')
                ->withErrors('403');

        $order = Orders::where('product_id', $id)->first();
        if($order)
        {
            return redirect('/backend/products')
                ->withErrors('403');
        }


        $product->delete();

        return redirect('/backend/products')
            ->withMessage('Product deleted');
    }

    /**
     * @param $id
     * @return Redirect
     */
    public function like($id)
    {
        if(\Auth::user() == null)
            return redirect('/auth/login')->withErrors('You have to log in to like');
        $product = Products::find($id);
        if($product == null)
            return redirect('/')->withErrors('Product does not exist');
        $user_id = Auth::user()->id;
        $rating = ProductsLikes::where('user_id',$user_id)->where('product_id',$id)->first();
        if($rating == null)
        {
            $product->likes = 1;
            $product->save();
            $rating = new ProductsLikes();
            $rating->likes = 1;
            $rating->dislikes = 0;
            $rating->user_id = $user_id;
            $rating->product_id = $product->id;
            $rating->save();
        }
        else
            if($rating->likes == 1)
            {
                $product->likes -= 1;
                $product->save();
                $rating->likes = 0;
                $rating->dislikes = 0;
                $rating->save();
            }
            else
                if($rating->likes == 0)
                {
                    if($rating->dislikes == 1)
                    {
                        $product->likes += 2;
                        $product->save();
                    }
                    else
                    {
                        $product->likes += 1;
                        $product->save();
                    }
                    $rating->likes = 1;
                    $rating->dislikes = 0;
                    $rating->save();
                }
        $product->save();
        return redirect('/product/view/'.$product->slug);
    }

    /**
     * @param $id
     * @return Redirect
     */
    public function dislike($id)
    {
        if(Auth::user() == null)
            return redirect('/auth/login')->withErrors('You are not logged in');
        $product = Products::find($id);
        if($product == null)
            return redirect('/')->withErrors('Post does not exist');
        $user_id = Auth::user()->id;
        $rating = ProductsLikes::where('user_id',$user_id)->where('product_id',$id)->first();
        if($rating == null)
        {
            $product->likes = -1;
            $product->save();
            $rating = new ProductsLikes();
            $rating->user_id = $user_id;
            $rating->product_id = $product->id;
            $rating->dislikes = 1;
            $rating->likes = 0;
            $rating->save();
        }
        else
            if($rating->dislikes == 1)
            {
                $product->likes += 1;
                $product->save();
                $rating->likes = 0;
                $rating->dislikes = 0;
                $rating->save();
            }
            else
                if($rating->dislikes == 0)
                {
                    if($rating->likes == 1)
                    {
                        $product->likes -= 2;
                        $product->save();
                    }
                    else
                    {
                        $product->likes -= 1;
                        $product->save();
                    }
                    $rating->likes = 0;
                    $rating->dislikes = 1;
                    $rating->save();
                }
        $product->save();
        return redirect('/product/view/'.$product->slug);
    }
}
