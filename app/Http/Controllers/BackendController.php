<?php namespace App\Http\Controllers;

use App\Categories;
use App\Championships;
use App\Hero;
use App\HeroesTypes;
use App\Http\Requests;
use App\Products;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BackendController extends Controller {
	/**
	 * @return $this
	 */
	public function index()
	{
		return view('backend.index')
			->with('page', 'home');
	}

	/**
	 * @return mixed
	 */
	public function products()
	{
		$products = Products::all();
		return view('backend.products')
			->withProducts($products );
	}

	/**
	 * @return mixed
	 */
	public function categories()
	{
		$categories = Categories::all();
		return view('backend.categories')
			->withCategories($categories );
	}

	/**
	 * @return mixed
	 */
	public function heroes()
	{
		$heroes = Hero::paginate(20);
		return view('backend.heroes')
			->withHeroes($heroes );
	}

	/**
	 * @return mixed
	 */
	public function classes()
	{
		$classes = HeroesTypes::paginate(20);
		return view('backend.classes')
			->with('classes', $classes);
	}

	/**
	 * @return $this
	 */
	public function championships()
	{
		$championships = Championships::paginate(20);
		return view('backend.championships')
			->with('championships', $championships);
	}
	
	public function sets()
	{
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
