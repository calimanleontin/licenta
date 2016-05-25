<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatsCost extends Model {

	protected $table = 'stats_costs';

    public function stats()
    {
        return $this->belongsTo('App\Stats');
    }

}
