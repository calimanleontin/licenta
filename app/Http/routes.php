<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home',['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/404', 'HomeController@notFound');


Route::group(['middleware' => ['web']], function () {
	Route::get('/sort','ProductController@sort');

	Route::get('auth/login', 'UserController@getLogin');
	Route::post('auth/login', 'UserController@postLogin');
	Route::get('auth/logout', 'UserController@getLogout');

	Route::get('auth/register', 'UserController@getRegister');
	Route::post('auth/register', 'UserController@postRegister');
	Route::get('/search','ProductController@search');
	Route::get('/product/view/{slug}','ProductController@show');
	Route::get('/category/view/{slug}','CategoryController@show');



	Route::get('/email',function(){
		Mail::send('home',['name'=> 'leontin'],function($message){

			$message->to('calimanleontin@gmail.com', 'leontin')->from('calimanleontin@gmail.com')->subject('welcome');
		});
	});


	Route::group(['middleware' => ['auth']], function()
	{
		Route::get('/api/auto-complete', 'ProductController@autoComplete');
		
		Route::get('/shop',['as' => 'shop', 'uses' => 'ProductController@index']);
		
		Route::get('/api/comments/{product_slug}', 'ProductController@getComments');
		Route::get('/api/getUser', 'UserController@getUser');
		Route::post('/api/comments/save/{product_slug}', 'ProductController@saveApiComment');
		Route::get('/set/view/{id}', 'ProductController@viewSet');
		Route::get('/championship/view/{id}', 'ChampionshipController@show');

		Route::get('/cart/index','CartController@index');
		Route::get('/cart/increase/{id}','CartController@increase');
		Route::get('/cart/decrease/{id}','CartController@decrease');
		Route::get('/cart/delete/{id}','CartController@delete');
		Route::post('/comment/store','CommentController@store');
		Route::get('comment/delete/{id}','CommentController@delete');
		Route::get('comment/edit/{id}','CommentController@edit');
		Route::post('comment/update','CommentController@update');
		Route::get('finish-cart','CartController@finish');
		Route::get('/order-history','CartController@history');
		Route::get('/edit-profile','UserController@edit_profile');
		Route::get('/user-profile','UserController@profile');
		Route::post('/profile/update','UserController@update_profile');
		Route::get('/tops', 'HomeController@tops');
		Route::get('/challenge/{id}', 'HomeController@challenge');
		Route::get('/fight/{id1}/{id2}', 'HomeController@fight');
		Route::post('/recommend', 'ProductController@recommendProducts');

		Route::get('order-details/{id}','CartController@order_details');
		Route::get('/to-cart/{id}','CartController@add')->where('id', '[0-9]+');

		Route::get('/product/like/{id}','ProductController@like');
		Route::get('/product/dislike/{id}','ProductController@dislike');


		Route::get('/lists/championships', 'ChampionshipController@index');
		Route::get('/attend/{id}', 'ChampionshipController@attend');
		Route::get('/tree/{id}', 'ChampionshipController@tree');
		
		Route::post('/set-products', 'HeroController@setProducts');


		Route::get('/training', 'HomeController@trainingPlaces');
		Route::get('/work', 'HomeController@workPlaces');
		Route::get('/outside', 'HomeController@outsidePlaces');
		Route::get('/increase', 'HomeController@increase');

		Route::get('/work-at', 'HomeController@work');
		Route::get('/go-to', 'HomeController@leave');

	});

});

Route::group(['middleware' => ['admin']], function() {

	Route::get('/edit/product/{id}','ProductController@edit');
	Route::get('/product/delete/{id}', 'ProductController@delete');
	Route::post('/update/product/{id}','ProductController@update');
	Route::Get('/hero/{id}', 'HeroController@viewHero');

	Route::get('category/create','CategoryController@create');
	Route::get('/product/create','ProductController@create');
	Route::get('category/edit/{id}','CategoryController@edit');
	Route::post('category/update','CategoryController@update');
	Route::post('category/store','CategoryController@store');
	Route::post('/product/store','ProductController@store');

	Route::get('/backend', 'BackendController@index');
	Route::get('/backend/products', 'BackendController@products');
	Route::get('/backend/categories', 'BackendController@categories');
	Route::get('/backend/families', 'BackendController@family');
	Route::get('/backend/heroes', 'BackendController@heroes');
	Route::get('/backend/championships', 'BackendController@championships');

	Route::get('/class/create', 'HeroesTypesController@create');
	Route::post('/class/store', 'HeroesTypesController@store');
	Route::post('/class/update/{id}', 'HeroesTypesController@update');
	Route::get('/class/edit/{id}', 'HeroesTypesController@edit');
	Route::get('/class/delete/{id}', 'HeroesTypesController@destroy');

	Route::get('/set/create', 'SetsController@create');
	Route::post('/set/store', 'SetsController@store');
	Route::get('/set/edit/{id}', 'SetsController@edit');
	Route::get('/set/delete/{id}', 'SetsController@destroy');

	Route::post('/championship/store', 'ChampionshipController@store');
	Route::get('/championship/create', 'ChampionshipController@create');
	Route::get('/championship/destroy/{id}', 'ChampionshipController@destroy');

	Route::get('/backend/classes', 'BackendController@classes');
	Route::get('/backend/sets', 'BackendController@sets');

	Route::get('/category/delete/{id}', 'CategoryController@delete');
	Route::get('/create-hero', 'HeroController@index');
	Route::post('/hero/create', 'HeroController@create');


	//todo: better hard-code them on a routes or artisan, something
});