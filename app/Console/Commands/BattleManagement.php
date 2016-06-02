<?php namespace App\Console\Commands;

use App\Championships;
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
        }
    }

}
