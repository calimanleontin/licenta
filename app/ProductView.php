<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model {

	protected $table = 'product_views';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Products');
    }

}
