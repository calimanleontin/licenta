<?php namespace App\Console\Commands;

use App\Championships;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class ChampionshipScheduler extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'start_battles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the championships';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $championships = Championships::where('active', 1)->where('started', 0)->where('start_date', date('Y-m-d'))->get();
        foreach($championships as $championship)
        {
            $championship->started = 1;
            $championship->round = 4;
            $heroes = $championship->heroes;
            $level_four = [];
            foreach($heroes as $hero)
            {
                $level_four[] = $hero->id;
            }
            $championship->level_four = json_encode($level_four);
            $championship->save();
        }

        \Log::info('I was here' . date('Y-m-d H:m:s'));
        $this->info("Champ updated!");

    }

}
