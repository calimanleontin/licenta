<?php namespace App\Http\Controllers;

use App\Hero;
use App\HeroesTypes;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HeroesTypesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->checkIfAdmin();
		return view('heroes_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->checkIfAdmin();

		$name = Input::get('name');
		$duplicate = HeroesTypes::where('name',$name)->first();
		if($duplicate)
			return redirect('/class/create')
				->withErrors('The name already exists');
		$description = Input::get('description');
		$strength= Input::get('strength');
		$perception= Input::get('perception');
		$endurance = Input::get('endurance');
		$charisma = Input::get('charisma');
		$intelligence = Input::get('intelligence');
		$agility = Input::get('agility');
		$luck = Input::get('luck');

		$user_id = $request->user()->id;
		$class = new HeroesTypes();
		$class->name = $name;
		$class->strength = $strength;
		$class->perception = $perception;
		$class->endurance= $endurance;
		$class->charisma = $charisma;
		$class->intelligence = $intelligence;
		$class->agility = $agility;
		$class->luck= $luck;
		$class->description = $description;
		$class->author_id = $user_id;

		if(Input::file('image') != null) {
			$destinationPath = 'images/classes'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
			$class->image = $fileName;
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		}
		$class->save();

		return redirect('/backend/classes')->withMessage('New class created');
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
		$this->checkIfAdmin();
		$class = HeroesTypes::find($id);
		if(!$class)
			return redirect('/backend/index')
				->withErrors('404');
		return view('heroes_types.create')
			->with('class', $class);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$image = Input::file('image');
		$class = HeroesTypes::find($id);
		$name = Input::get('name');
		$duplicate = HeroesTypes::where('name',$name)->first();
		if($duplicate != null and $duplicate->id != $class->id)
			return redirect('/class/edit/'.$class->id)
				->withErrors('The name is already in use')
				->with('class', $class);
		if($image != null)
		{
			$destinationPath = 'images/classes'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension();
			$fileName = rand(11111, 99999) . '.' . $extension;
			$class->image = $fileName;
			Input::file('image')->move($destinationPath, $fileName);
		}

		$description = Input::get('description');
		$strength= Input::get('strength');
		$perception= Input::get('perception');
		$endurance = Input::get('endurance');
		$charisma = Input::get('charisma');
		$intelligence = Input::get('intelligence');
		$agility = Input::get('agility');
		$luck = Input::get('luck');

		$class->name = $name;
		$class->strength = $strength;
		$class->perception = $perception;
		$class->endurance= $endurance;
		$class->charisma = $charisma;
		$class->intelligence = $intelligence;
		$class->agility = $agility;
		$class->luck= $luck;
		$class->description = $description;

		$class->save();

		return redirect('/backend/classes')
			->withMessage('200');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$class = HeroesTypes::find($id);
		if(!$class)
			return redirect('/backend/classes')
				->withErrors('404');
		$heroes = Hero::where('class_id', $id)->get()->all();
		if(count($heroes) == 0)
		{
			$class->delete();
			return redirect('/backend/classes')
				->withMessage('200');
		}
		else
		{
			return redirect('/backend/classes')
				->withErrors('403');
		}

	}

}
