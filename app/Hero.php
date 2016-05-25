<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model {

    public $attributes = [
        'level',
        'experience',
        'busy',
        'name',
        'sex',
        'image',
        'user_id',
        'stats_id',
        'intern_places_id',
        'outside_places_id',
        'championship_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

	protected $table = 'hero';

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
    public function internal_places()
    {
        return $this->belongsTo('App\InternalPlaces');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function external_places()
    {
        return $this->belongsTo('App\ExternalPlaces');
    }

    public function level()
    {
        return $this->hasOne('App\Levels');
    }
}
