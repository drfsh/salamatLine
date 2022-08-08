<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ResetViews extends Command
{
    protected $signature = 'ResetViews:item';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $views = DB::table('views')->truncate();
        return 0;
    }
}
