<?php namespace App\Http\Controllers;

use App\Championships;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ChampionshipController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$championships = Championships::where('active', 1)->get();
		return view('championship.index')
			->with('championships', $championships);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('championship.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$championship = new Championships();
		$championship->name = Input::get('name');
		$championship->reward = Input::get('reward');
		$championship->level_required = Input::get('level_required');
		$championship->ticket = Input::get('ticket');
		$championship->start_date = Input::get('start_date');
		$championship->max_experience= Input::get('max_experience');
		$championship->max_places = Input::get('max_places');
//		$championship->user_id = Auth::user()->id;
		$championship->started = 0;
		$championship->active = 1;
		$image = Input::file('image');

		if($image != null)
		{
			$destinationPath = 'images/catalog'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension();
			$fileName = rand(11111, 99999) . '.' . $extension;
			$championship->image = $fileName;
			Input::file('image')->move($destinationPath, $fileName);
		}
		$championship->save();
		return redirect('/backend/championships')
			->withMessage('200');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$championship = Championships::find($id);
		if(!$championship)
			return redirect('/')
				->withErrors('404');
		return view('championship.view')
			->with('championship', $championship);
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
		$championship = Championships::find($id);
		if(!$championship)
			return redirect('/backend/championships')
				->withErrors('404');
		if($championship->started == 0  and  count($championship->heroes) == 0)
		{
			$championship->delete();
			return redirect('/backend/championships')
				->withMessage('200');
		}
		else
		{
			return redirect('/backend/championships')
				->withErrors('403');
		}
	}

	public function attend($id)
	{
		$championship = Championships::find($id);
		if(!$championship)
			return view('/')
				->withErrors('404');
	}

}
