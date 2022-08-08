<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Log;

class DisableProduct extends Command
{

    protected $signature = 'disabl:product';


    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $list = Product::where('price',0)->orWhereNull('price')->whereDoesntHave('multiprice')->where('active',1)->get();


        foreach ($list as $item) {
            $item->active = 0;
            $item->save();
        }
        return 0;
    }
}
