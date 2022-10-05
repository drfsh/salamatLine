<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use Illuminate\Console\Command;

class DayReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:report';

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
     * @return int
     */
    public function handle()
    {
        $emails = ["mahdidera63@gmail.com", "test@gmail.com"];
        foreach ($emails as $email) {
            dispatch(new SendMailJob($email));
        }
        error_log("ok");
        return 0;
    }
}
