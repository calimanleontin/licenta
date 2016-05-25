<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Hero;
use App\Stats;
use App\Http\Controllers\Controller;
use App\StatsCost;
use \Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::guest())
		{
			$user = Auth::user();
			if(!empty($user->hero)){
				return redirect('/')
					->withError('You already have a hero');
			}
			return view('hero.create');
		}
		else
		{
			return redirect('/auth/login')
				->withError('You are not logged in');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!Auth::guest())
		{
			$user = Auth::user();
			if(!empty($user->hero)){
				return redirect('/')
					->withError('You already have a hero');
			}
			$name = Input::get('name');
			$sex = Input::get('sex');
			if(empty($name) or $sex == '0')
				return view('hero.create')
					->withErrors('Please fill all the fields')
					->with('name', $name)
					->with('sex', $sex);
			$hero = new Hero();
			$hero->user_id = $user->id;
			$hero->name = $name;
			$hero->sex = $sex;
			$stats = new Stats();
			$stats->save();
			$stats_cost= new StatsCost();
			$stats_cost->stats_id = $stats->id;
			$hero->stats_id = $stats->id;
			$hero->save();
			return redirect('/')
				->with('user', $user)
				->with('hero', $hero);
		}
		else
		{
			return redirect('/auth/login')
				->withError('You are not logged in');
		}
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
