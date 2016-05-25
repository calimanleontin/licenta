<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model {

	protected $table = 'levels';

    public function hero()
    {
        return $this->belongsTo('App\Hero');
    }

}
