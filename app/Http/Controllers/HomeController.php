<?php namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\Request;
use App\StatCost;
use App\Work;
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
		$products = $user->products->lists('id');
		$categories = Categories::all();
		return view('home-game')
			->with('user', $user)
			->with('hero', $user->hero)
			->with('categories', $categories)
			->with('products', $products);
	}

	public function notFound()
	{
		return view('auth.404');
	}

	public function trainingPlaces()
	{
		$user = Auth::user();
		$hero = $user->hero;
		$cost1 = StatCost::where('id', $hero->stats->strength + 1)->first();
		$cost2 = StatCost::where('id', $hero->stats->perception + 1)->first();
		$cost3 = StatCost::where('id', $hero->stats->endurance + 1)->first();
		$cost4 = StatCost::where('id', $hero->stats->charisma + 1)->first();
		$cost5 = StatCost::where('id', $hero->stats->intelligence + 1)->first();
		$cost6 = StatCost::where('id', $hero->stats->agility + 1)->first();
		$cost7 = StatCost::where('id', $hero->stats->luck + 1)->first();
		return view('hero.training')
			->with('cost1', $cost1)
			->with('cost2', $cost2)
			->with('cost3', $cost3)
			->with('cost4', $cost4)
			->with('cost5', $cost5)
			->with('cost6', $cost6)
			->with('cost7', $cost7)
			->with('hero', $hero);
	}

	public function increase()
	{
		$user = Auth::user();
		$hero = $user->hero;
		$stats = $hero->stats;
		$stat = $_GET['type'];
		$stats_cost = StatCost::where('id', $hero->stats->{$stat} + 1)->first();
		if($stats_cost[$stat.'_cost'] > $user->money)
			return redirect('/training')
				->withErrors('Insufficient founds');
		$user->money -= $stats_cost[$stat.'_cost'];
		$user->save();
		$stats->{$stat} += 1;
		$stats->{'final_'.$stat } += 1;
		$stats->save();
		return redirect('/training')
			->withMessage('Success');
	}

	public function workPlaces()
	{
		$user = Auth::user();
		$places = Work::all();
		
		$hero = $user->hero;
		return view('hero.work')
			->with('places', $places)
			->with('hero', $hero);
	}
}
