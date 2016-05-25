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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function championship()
    {
        return $this->belongsTo('App\Championship');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function intern_places()
    {
        return $this->belongsTo('App\InternalPlaces');
    }

    public function extern_places()
    {
        return $this->belongsTo('App\ExternalPlaces');
    }

}
