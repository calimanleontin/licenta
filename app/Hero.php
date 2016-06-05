<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model {

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
        return $this->belongsTo('App\Stats');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function level()
    {
        return $this->hasOne('App\Levels');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Products');
    }

    /**
     * @return int|mixed
     */
    public function attributes_sum()
    {
        $sum = 0;
        $sum += $this->final_strenght;
        $sum += $this->final_perception;
        $sum += $this->final_endurane;
        $sum += $this->final_charisma;
        $sum += $this->final_intelligence;
        $sum += $this->final_luck;
        return $sum;
    }

    /**
     * @param $exp
     * @param $money
     */
    public function getPrize($exp, $money)
    {
        $user = $this->user;
        $user->money += $money;
        $level = Levels::find($user->level);
        $exp = ($exp+$user->experience) % $level->max_experience;
        $next_level = ($exp+$user->experience) / $level->max_experience;

        if($next_level == 0)
        {
            $user->experience = $exp;
        }
        else
        {
            $user->experience = $exp;
            $user->level = $user->level + 1;
        }
        $user->save();
    }
}
