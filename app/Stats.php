<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model {

	protected $table = 'stats';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hero()
    {
        return $this->hasOne('App\Hero');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Products');
    }
}
