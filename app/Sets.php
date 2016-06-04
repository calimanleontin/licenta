<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sets extends Model {

	protected $table = 'sets';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Products', 'set_id');
    }

}
