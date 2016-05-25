<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Championships extends Model {

	protected $table = 'championships';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function heroes()
    {
        return $this->hasMany('App\Hero');
    }

}
