<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatCost extends Model {

	protected $table = 'stats_cost';

	public function stat()
	{
		return $this->belongsTo('App/Stats');
	}

}
