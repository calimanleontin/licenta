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


}
