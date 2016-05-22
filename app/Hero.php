<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model {

	protected $table = 'hero';

    protected $attributes = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stats()
    {
        return $this->hasOne('App\Stats');
    }

}
