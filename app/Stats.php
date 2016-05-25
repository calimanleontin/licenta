<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model {

	protected $table = 'stats';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hero()
    {
        return $this->belongsTo('App\Hero');
    }

    public function stats_costs()
    {
        return $this->hasOne('App\StatsCost');
    }

}
