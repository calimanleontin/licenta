<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function create(Request $request)
    {
        if(Auth::guest())
            return redirect("/")
                ->withErrors('You are not logged in');
        $categories = Categories::all();
        if($request->user()->can_create_category())
            return view('category.create')
                ->withCategories($categories);
        return redirect('/')
            ->withErrors('You have not sufficient permission to create a new category');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function store(Request $request)
    {
        if(Input::get('id')!= null)
        {
            $category = Categories::find(Input::get('id'));
            $duplicate = Categories::where('title',$request->input('title'))->first();
            if($duplicate != null and $duplicate->id != Input::get('id'))
                return view('category.create')
                    ->withErrors('Name already used')
                    ->withCategory($category)
                    ->withTitle('Update '.$category->title);
            $category->title = $request->input('title');
            $category->description = $request->input('description');
            $category->slug = str_slug($category->title);
            $category->author_id = $request->user()->id;
            $category->save();
            return redirect('/backend/categories')->withMessage('New category created');
        }
        $duplicate = Categories::where('title',$request->input('title'))->first();

        if($duplicate == NULL)
        {
            $category = new Categories();
            $category->title = $request->input('title');
            $category->description = $request->input('description');
            $category->slug = str_slug($category->title);
            $category->author_id = $request->user()->id;
            $category->save();
            return redirect('/backend/categories')->withMessage('Updated successfully');
        }
        else
            return redirect('/category/create')->withErrors('Name already used');
    }

    /**
     * @param $slug
     * @return $this
     */
    public function show($slug)
    {
        /**
         * @var $category Categories
         */
        $category = Categories::where('slug',$slug)->first();
        if($category == NULL)
            return redirect('/')->withErrors('Requested url does not exist');
        $categories = Categories::all();
        /**
         * @var $products Products
         */
        $products = $category->products()->paginate(9);
        return view('home-shop')
            ->withProducts($products)
            ->withCategories($categories)
            ->withTitle('Products from the  category '.$category->title);
    }


    public function edit($id)
    {
        $user = Auth::user();
        $category = Categories::find($id);
        if($category == null)
            return redirect('/')
                ->withErrors('404');
        if($user->can_create_category())
        return view('category.create')
            ->withCategory($category)
            ->withTitle('Update '.$category->title);
    }

    public function delete($id)
    {
        if(Auth::guest())
            return redirect('/')
                ->withErrors('404');
        $user = Auth::user();
        if($user->is_admin() == false)
            return redirect('/')
                ->withErrors('404');
        $category = Categories::find($id);
        if(count($category->products) != 0)
        {
            return redirect('/backend/categories')
                ->withErrors('403');
        }

        $category->delete();
        return redirect('/backend/categories')
            ->withMessage('200');

    }

}
