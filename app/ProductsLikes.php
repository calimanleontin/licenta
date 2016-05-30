<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsLikes extends Model {

	protected $table = 'product_likes';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Products');
    }

}
