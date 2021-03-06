<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Orders;
use App\Products;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        $products = array();
        $quantities = array();
        foreach ($cart->getCart() as $key =>$item) {
            $product = Products::where('id',$key)->first();
            if($product != null)
            {
                $products[] = $product;
                $quantities[] = $item;
            }
        }
        $categories = Categories::all();

        return view('cart.index')
            ->withQuantities($quantities)
            ->withProducts($products)
            ->withCategories($categories);
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function add(Request $request,$id)
    {
       if($request->user() == null)
           return redirect('/auth/login')->withErrors('You first have to login');
        $product = Products::where('id',$id)->where('active',1)->first();
        if($product == NULL)
            return redirect('/')->withErrors('The product doesn\'t exist ' );


        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        if($product->quantity > 0)
        {
            $cart->addNewProduct($product->id);
            Session::put('cart',$cart);
        }
        else
            return redirect('/cart/index')->withErrors('The stock is insufficient');
        return redirect('/cart/index')->withMessage('Product successfully added to cart');
    }

    /**
     * @param $id
     * @return $this
     */
    public function increase($id)
    {
        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        if($cart->checkProduct($id))
            $cart->increaseQuantity($id);
        else
            return redirect('/cart/index')->withErrors('Product not found');

        return redirect('/cart/index')->withMessage('Quantity increased successfully');
    }

    /**
     * @param $id
     * @return $this
     */
    public function decrease($id)
    {
        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        if($cart->checkProduct($id)) {
            if($cart->getQuantity($id) >1)
                $cart->decreaseQuantity($id);
            else
            {
                return redirect('/cart/index')->withErrors('Can\'t decrease a quantity to 0');
            }
        }
        else
            return redirect('/cart/index')->withErrors('Product not found');

        return redirect('/cart/index')->withMessage('Quantity increased successfully');
    }

    /**
     * @param $id
     * @return $this
     */
    public function delete($id)
    {
        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        if($cart->checkProduct($id))
            $cart->removeProduct($id);
        else
            return redirect('/cart/index')->withErrors('Product not found');

        return redirect('/cart/index')->withMessage('Product erased from cart successfully');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function finish(Request $request)
    {
        /**
         * @var $cart Cart
         */
        $cart = Session::get('cart');
        $order_id = null;
        /**
         * @var $last_order Orders
         */
        $last_order = Orders::whereNotNull('id')->orderBy('updated_at','desc')->first();

        $total_price = 0;
        foreach($cart->getCart() as $product_id => $quantity)
        {
            $product = Products::find($product_id);
            $total_price += $product->price * $quantity;
        }

        if(Auth::user()->money < $total_price)
            return redirect('/cart/index')
                ->withErrors('Insufficient founds');
            if($last_order == Null)
        {
            $order_id = 1;
        }
        else
        {
            $order_id = $last_order->order_id + 1;
        }
        foreach($cart->getCart() as $product_id => $quantity) {
            $product = Products::where('id', $product_id)->first();
            if ($product->quantity < $quantity) {
                return redirect('/cart/index')->withErrors('We are sorry, the product ' . $product->name . ' has only ' . $product->quantity . ' examples');
            }
        }
        foreach($cart->getCart() as $product_id => $quantity) {
            $product = Products::where('id', $product_id)->first();
            $user = Auth::user();
            $ok = 0;
            $products_id = [];
            foreach($user->products as $product_cart)
            {
                $products_id[] = $product_cart->id;
            }
            if(in_array($product_id, $products_id))
            {
                foreach($product->categories as $category)
                {
                    if($category->title == 'consumable')
                    {
                        $ok = 1;
                    }
                }
                if($ok == 0)
                    return redirect('/cart/index')
                        ->withErrors('We are sorry, the product ' . $product->name . ' is not consumable so cannot be bought many times' );
            }
        }
        $sum = 0;
        /**
         * @var $user User
         */
        $user = Auth::user();

        foreach($cart->getCart() as $product_id => $quantity)
        {
            $product = Products::where('id', $product_id)->first();
            $user->products()->attach($product->id);
            $product->quantity -= $quantity;
            $sum += $product->price * $quantity;
            if($product->quantity == 0)
                $product->active = 0;
            $product->save();

            $order = new Orders();
            $order->order_id = $order_id;
            $order->product_id = $product_id;
            $order->quantity = $quantity;
            $order->author_id = $request->user()->id;
            $order->sum = $product->price;
            $order->save();

        }
        $user->money -= $sum;
        $user->save();
        Session::forget('cart');
        Session::put('cart', new Cart());

        return redirect('/')->withMessage('Order processed successfully');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function history(Request $request)
    {
        $user = $request->user();
        $orders = Orders::where('author_id',$user->id)->orderBy('created_at','asc')->paginate(10);
        for($i=1;$i<count($orders);$i++)
        {
            if($orders[$i]->order_id == $orders[$i-1]->order_id)
                unset($orders[$i-1]);
        }
        return view('cart.history')
            ->withOrders($orders);

    }

    /**
     * @param Request $request
     * @param $order_id
     * @return $this
     */
    public function order_details(Request $request, $order_id)
    {
        $orders = Orders::where('order_id',$order_id)->get();

        if($request->user()->id == $orders->first()->author_id) {
            $products = array();
            $quantities = array();
            foreach ($orders as $order) {
                $products[] = Products::where('id', $order->product_id)->first() ;
                $quantities[] = $order->quantity;
            }
            $categories =Categories::all();
            return view('cart.details')
                ->withProducts($products)
                ->withQuantities($quantities)
                ->withCategories($categories);
        }
        else
            return redirect('/')->withErrors('You have not sufficient permissions');
    }

}
