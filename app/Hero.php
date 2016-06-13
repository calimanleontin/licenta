<?php namespace App;

use Carbon\Carbon;
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work()
    {
        return $this->belongsTo('App\Work', 'works_id');
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
        $level = Levels::find($user->hero->level);
        $exp = ($exp+$user->experience) % $level->max_experience;
        $next_level = ($exp+$user->experience) / $level->max_experience;

        if($next_level == 0)
        {
            $this->experience = $exp;
        }
        else
        {
            $this->experience = $exp;
            $this->level = $user->level + 1;
        }
        $user->save();
        $this->save();
    }

    /**
     * @param $stat
     * @param $value
     */
    public function increaseStat($stat, $value)
    {
        $this->stats->attributes[$stat] += $value;

    }

    /**
     * @return bool
     */
    public function checkIfAvailable()
    {
        if($this->busy == 1)
        {
            if(new \DateTime($this->ended_at) <= Carbon::now())
            {
                $this->ended_at = null;
                $this->started_at = null;
                $this->busy = 0;
                if($this->location == 'work')
                {
                    $work = $this->work;
                    $this->getPrize($work->experience, $work->reward);
                    $this->works_id = null;
                }

                if($this->location == 'championship')
                {
                    $championship = $this->championship;
                    $this->getPrize($championship->max_experience, $championship->reward);
                    $this->championship_id = null;
                }

                if($this->location == 'wasteland')
                {
                    $wasteland = $this->external_places;
                    $this->getPrize($wasteland->experience, $wasteland->reward);
                    $this->outside_places_id = null;
                }

                $this->location = 'home';
                $this->save();
            }
            else
            {
                return false;
            }
        }
        return true;
    }
}
