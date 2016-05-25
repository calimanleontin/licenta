<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalPlaces extends Model {

    protected $table = 'intern_places';

    public function heroes()
    {
        return $this->hasMany('App\Heroes');
    }
}
