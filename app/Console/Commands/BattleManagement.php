<?php namespace App\Console\Commands;

use App\Championships;
use App\Hero;
use App\Http\Controllers\HeroController;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class BattleManagement extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'fight';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage every-day championship fight';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $championships = Championships::where('active', 1)->where('started', 1)->get();

        foreach($championships as $championship)
        {
            $level = $championship->level;

            if($level == 4)
            {
                $battles = $championship->level_four;
            }
            if($level == 3)
            {
                $battles = $championship->level_three;
            }
            if($level == 2)
            {
                $battles = $championship->level_two;
            }

            $battles = json_decode($battles);

            $json = [];
            for($i = 0; $i< count($battles)-1 ; $i++)
            {
                $winner = HeroController::fight($battles[$i], $battles[$i + 1]);
                $json[] = $winner->id;
            }
            if($level == 4)
            {
                $championship->level_tree = json_encode($json);
            }
            if($level == 3)
            {
                $championship->level_two = json_encode($json);
            }
            if($level == 2)
            {
                $championship->level_one = json_encode($json);
                $hero = Hero::find($json[0]);
                $hero->getPrize($championship->experience, $championship->prize);
            }

            $championship->level = $level - 1;
            if($championship->level == 1)
            {
                $championship->active = 1;
                $heroes = $championship->heroes;
                foreach($heroes as $hero)
                {
                    $hero->busy = 0;
                    $hero->location = null;
                    $hero->save();

                }
            }
            $championship->save();
        }
    }

}
