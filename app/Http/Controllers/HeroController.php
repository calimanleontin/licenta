<?php namespace App\Http\Controllers;

use App\HeroesTypes;
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
			return view('hero.create')
				->with('classes', HeroesTypes::all());
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
			$classes = HeroesTypes::all();
			$sex = Input::get('sex');
			if(empty($name) or $sex == '0')
				return view('hero.create')
					->withErrors('Please fill all the fields')
					->with('name', $name)
					->withClasses($classes)
					->with('sex', $sex);
			$hero = new Hero();
			$hero->user_id = $user->id;
			$hero->name = $name;
			$hero->sex = $sex;
			$hero->location  = 'home';
			$hero->level = 1;
			$hero->experience = 0;
			$hero->busy = 0;
			$hero->class_id = Input::get('class');
			$class = HeroesTypes::find($hero->class_id);

			$stats = new Stats();
			$stats->strength = $class->strength;
			$stats->perception = $class->perception;
			$stats->endurance = $class->endurance;
			$stats->charisma = $class->charisma;
			$stats->intelligence = $class->intelligence;
			$stats->agility = $class->agility;
			$stats->luck = $class->luck;
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

	public static function fight($id1, $id2)
	{
		$hero1 = Hero::find($id1);
		$hero2 = Hero::find($id2);

		$sum1 = $hero1->attributes_sum();
		$sum2 = $hero2->attributes_sum();

		if($sum1 < $sum2)
			return $hero1;
		return $hero2;
	}

}
