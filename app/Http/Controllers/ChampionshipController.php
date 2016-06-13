<?php namespace App\Http\Controllers;

use App\Championships;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Hero;
use App\User;
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

	/**
	 * @param $id
	 * @return $this
	 */
	public function attend($id)
	{
		$championship = Championships::find($id);
		if(!$championship)
			return redirect('/')
				->withErrors('404');

		$user = Auth::user();
		if($user->hero->level < $championship->level_required)
			return redirect('/championship/view/'.$championship->id)
				->withErrors('403');

		$hero = $user->hero;
		$hero->checkIfAvailable();

		if($hero->busy == 1)
		{
			return redirect('/championship/view/'.$championship->id)
				->withErrors('Hero is busy');
		}

		if($championship->max_places == 0)
		{
			return redirect('/championship/view/'.$championship->id)
				->withErrors('No more places');
		}
		$hero->busy = 1;
		$hero->location = 'championship';
		$hero->championship_id = $championship->id;
		$championship->max_places -= 1;

		$hero->save();
		$championship->save();
		return redirect('/championship/view/'.$championship->id)
			->withMessage('200');
	}

	public function dismiss($id)
	{
		$championship = Championships::find($id);
		if(!$championship)
			return view('/')
				->withErrors('404');

		$user = Auth::user();
		if($user->hero->level < $championship->level_required)
			return redirect('/championship/view/'.$championship->id)
				->withErrors('403');
		$hero = $user->hero;

	}

	public function tree($id)
	{
		$championship = Championships::find($id);
		if(!$championship)
			return view('/')
				->withErrors('404');

		$champion = null;
		$semifinalist1 = null;
		$semifinalist2 = null;
		$quarter1 = null;
		$quarter2 = null;
		$quarter3 = null;
		$quarter4 = null;
		$nr1 = null;
		$nr2 = null;
		$nr3 = null;
		$nr4 = null;
		$nr5 = null;
		$nr6 = null;
		$nr7 = null;
		$nr8 = null;
		if((json_decode($championship->level_one)))
		{
			$champion = json_decode($championship->level_one);
		}
		if(!empty(json_decode($championship->level_two)))
		{
			$semifinalist1 = json_decode($championship->level_two[0]);
			$semifinalist2 = json_decode($championship->level_two[1]);
		}
		if(!empty(json_decode($championship->level_three)))
		{
			$quarter1 = json_decode($championship->level_three[0]);
			$quarter2 = json_decode($championship->level_three[1]);
			$quarter3 = json_decode($championship->level_three[2]);
			$quarter4 = json_decode($championship->level_three[3]);
		}
		if(!empty(json_decode($championship->level_four)))
		{
			$nr1 = json_decode($championship->level_four[0]);
			$nr2 = json_decode($championship->level_four[1]);
			$nr3 = json_decode($championship->level_four[2]);
			$nr4 = json_decode($championship->level_four[3]);
			$nr5 = json_decode($championship->level_four[4]);
			$nr6 = json_decode($championship->level_four[5]);
			$nr7 = json_decode($championship->level_four[6]);
			$nr8 = json_decode($championship->level_four[7]);
		}

		return view('championship.tree')
			->with('champion', $champion )
			->with('semifinalist1', $semifinalist1)
			->with('semifinalist2', $semifinalist2)
			->with('quarter1', $quarter1)
			->with('quarter2', $quarter2)
			->with('quarter3', $quarter3)
			->with('quarter4', $quarter4)
			->with('nr1', $nr1)
			->with('nr1', $nr2)
			->with('nr1', $nr3)
			->with('nr1', $nr4)
			->with('nr1', $nr5)
			->with('nr1', $nr6)
			->with('nr1', $nr7)
			->with('nr1', $nr8);
	}

}
