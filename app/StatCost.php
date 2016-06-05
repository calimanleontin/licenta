<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatCost extends Model {

	protected $table = 'stats_costs';

	public function stat()
	{
		return $this->belongsTo('App/Stats');
	}

}
