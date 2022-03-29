<?php

namespace App\Console\Commands;

use App\MostViewed;
use Illuminate\Console\Command;

class CheckViewed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:viewed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $viewed = MostViewed::all();
        foreach ($viewed as $view) {
            $view->viewable->update(['total_view' => 0]);
            $view->delete();
        }
    }
}
