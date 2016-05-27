<?php namespace App\Http\Controllers;

use App\Categories;
use App\Hero;
use App\Http\Requests;
use App\Products;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BackendController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * @return $this
	 */
	public function checkIfAdmin()
	{
		if (Auth::guest()) {
			return view('auth.register')
				->with('admin', true);
		} else {
			if (Auth::user()->is_admin() == false) {
				Auth::logout();
				return view('auth.register')
					->with('admin', true);
			}
		}
	}

	/**
	 * @return $this
	 */
	public function index()
	{
		$this->checkIfAdmin();

		return view('backend.index')
			->with('page', 'home');
	}

	/**
	 * @return mixed
	 */
	public function products()
	{
		$this->checkIfAdmin();
		$products = Products::all();
		return view('backend.products')
			->withProducts($products );
	}

	/**
	 * @return mixed
	 */
	public function categories()
	{
		$this->checkIfAdmin();
		$categories = Categories::all();
		return view('backend.categories')
			->withCategories($categories );
	}

	public function heroes()
	{
		$this->checkIfAdmin();
		$heroes = Hero::paginate(20);
		return view('backend.heroes')
			->withHeroes($heroes );
	}

	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
