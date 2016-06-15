<?php namespace App\Http\Controllers;

use App\Categories;
use App\ExternalPlaces;
use App\Hero;
use App\Http\Requests\Request;
use App\StatCost;
use App\Work;
use Carbon\Carbon;
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
		if($hero->busy != 0)
			return redirect('/training')
				->withErrors('Hero already busy');

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

	/**
	 * @return $this
	 */
	public function workPlaces()
	{
		$user = Auth::user();
		$places = Work::all();

		$hero = $user->hero;
		return view('hero.work')
			->with('places', $places)
			->with('hero', $hero);
	}

	/**
	 * @return $this
	 */
	public function outsidePlaces()
	{
		$user = Auth::user();
		$hero = $user->hero;

		$places = ExternalPlaces::all();

		return view('hero.outside')
			->with('places', $places)
			->with('hero', $hero);
	}

	/**
	 * @return $this
	 */
	public function work()
	{
		$user = Auth::user();
		$hero = $user->hero;
		$hero->checkIfAvailable();
		if($hero->busy != 0)
			return redirect('/work')
				->withErrors('Hero already busy');

		$place = $_GET['type'];

		$work = Work::where('name', $place)->first();
		if(!$work)
			return redirect('/work')
				->withErrors('404');

		$hero->busy = 1;
		$hero->started_at = Carbon::now()->addHours($work->time_spent);
		$hero->ended_at = Carbon::now()->addHours($work->time_spent);
		$hero->location = 'work';
		$hero->works_id = $work->id;
		$hero->save();
		return redirect('/work')
			->withMessage('Success');
	}

	/**
	 * @return $this
	 */
	public function leave()
	{
		$user = Auth::user();
		$hero = $user->hero;
		$hero->checkIfAvailable();

		if($hero->busy != 0)
			return redirect('/outside')
				->withErrors('Hero already busy');

		$place = $_GET['type'];

		$out = ExternalPlaces::where('name', $place)->first();
		if(!$out)
			return redirect('/work')
				->withErrors('404');

		$hero->busy = 1;
		$hero->started_at = Carbon::now()->addHours($out->time_spent);
		$hero->ended_at = Carbon::now()->addHours($out->time_spent);
		$hero->location = 'wasteland';
		$hero->outside_places_id = $out->id;
		$hero->save();
		return redirect('/outside')
			->withMessage('Success');
	}

	/**
	 * @return $this
	 */
	public function tops()
	{
		$user = Auth::user();
		$hero = $user->hero;
		$level_min = $hero->level;
		$level_max = $hero->level;
		$nr = 0;
		$heroes = null;
		$first_ten = Hero::orderBy('level', 'desc')->limit(10)->get();
		$last_ten = Hero::orderBy('level', 'asc')->limit(10)->get()	;
		while(true)
		{
			$heroes = Hero::where('level','<=' , $level_max)->where('level', '>=', $level_min)->get();
			if(count($heroes) >= 10 or $nr == 10)
				break;
			$nr ++;
		}
		return view('championship.top')
			->with('heroes', $heroes)
			->with('first_ten', $first_ten)
			->with('last_ten', $last_ten)
			->with('champ', $hero);

	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function challenge($id)
	{
		$challenger = Auth::user()->hero;
		$challenged = Hero::find($id);
		if($challenged == null)
			return redirect('/tops')
				->withErrors('No hero found');
		return view('championship.fight')
			->with('challenger', $challenger)
			->with('challenged', $challenged);
	}

	/**
	 * @param $id1
	 * @param $id2
	 * @return $this
	 */
	public function fight($id1, $id2)
	{
		/**
 		 * @var $hero Hero
		 */
		$hero = Auth::user()->hero;
		$hero->checkIfAvailable();
		if($hero->busy == 1)
		{
			return redirect('/tops')
				->withErrors('Hero busy');
		}
		/**
		 * @var $champion Hero
		 */
		$champion = HeroController::fight($id1, $id2);
		$champion->getPrize(200, 200);
		if($champion->id == $hero->id)
			return redirect('/tops')
				->withMessage('YOU WON');
		else
		{
			$challenged = Hero::find($id2);
			$strength = $challenged->stats->final_strength - $hero->stats->final_strength;
			$perception = $challenged->stats->final_perception - $hero->stats->final_perception;
			$endurance = $challenged->stats->final_endurance - $hero->stats->final_endurance;
			$charisma = $challenged->stats->final_charisma - $hero->stats->final_charisma;
			$intelligence = $challenged->stats->final_intelligence - $hero->stats->final_intelligence;
			$agility = $challenged->stats->final_agility - $hero->stats->final_agility;
			$luck = $challenged->stats->final_luck - $hero->stats->final_luck;
			$stats = [];
			$stats[] = $strength>0?$strength:null;
			$stats[] = $perception>0?$perception:null;
			$stats[] = $endurance>0?$endurance:null;
			$stats[] = $charisma>0?$charisma:null;
			$stats[] = $intelligence>0?$intelligence:null;
			$stats[] = $agility>0?$agility:null;
			$stats[] = $luck>0?$luck:null;
			return redirect('/tops')
				->withStats($stats)
				->withErrors('YOU LOSE');
		}

	}
}
