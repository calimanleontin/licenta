<?php namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * HomeController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		if(Auth::guest())
			return view('auth.register');
		$user = Auth::user();
		$categories = Categories::all();
		return view('home-game')
			->with('user', $user)
			->with('hero', $user->hero)
			->with('categories', $categories);
	}

	public function notFound()
	{
		return view('auth.404');
	}
}
