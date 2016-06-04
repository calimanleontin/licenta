<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Categories')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cart()
    {
        return $this->belongsToMany('App\Cart')->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany('App\Orders')->withTimestamps();
    }

    public function decreaseQuantity($product_id, $number)
    {
        $product = Products::where('id',$product_id)->first();
        $product->quantity -= $number;
        $product->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hero()
    {
        return $this->belongsTo('App\Hero');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function view()
    {
        return $this->hasOne('App\ProductView');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stats()
    {
        return $this->belongsTo('App\Stats');
    }

    public function set()
    {
        return $this->belongsTo('App\Sets');
    }

}
