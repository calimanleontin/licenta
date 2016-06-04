<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use App\Sets;
use Illuminate\Http\Request;

class SetsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('set.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(Input::get('id')!= null)
		{
			$set = Sets::find(Input::get('id'));
			$duplicate = Sets::where('name',$request->input('name'))->first();
			if($duplicate != null and $duplicate->id != Input::get('id'))
				return view('set.create')
					->withErrors('Name already used')
					->withCategory($set)
					->withTitle('Update '.$set->name);
			$set->name = $request->input('name');
			$set->description = $request->input('description');
			$set->bonus = $request->input('bonus');
//			$set->slug = str_slug($set->name);
			$set->save();
			return redirect('/backend/sets')->withMessage('Update successfully');
		}
		$duplicate = Sets::where('name',$request->input('name'))->first();

		if($duplicate == NULL)
		{
			$category = new Sets();
			$category->name = $request->input('name');
			$category->description = $request->input('description');
			$category->bonus = $request->input('bonus');
//			$category->slug = str_slug($category->name);
			$category->save();
			return redirect('/backend/sets')->withMessage('Updated successfully');
		}
		else
			return redirect('/set/create')->withErrors('Name already used');
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
		$set = Sets::find($id);
		return view('set.create')
			->withTitle('Update '.$set->name)
			->with('set', $set);
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
		$set = Sets::find($id);
		if(count($set->products) == 0)
		{
			$set->delete();
			return redirect('/backend/sets')
				->withMessage('200');
		}
		return redirect('/backend/sets')
			->withErrors('403');

	}

}
