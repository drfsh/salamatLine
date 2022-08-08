<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Star extends Component
{



    public string $title;
    public string $percent;

    public function __construct(string $title, string $percent)
    {

        $this->title = $title;
        $this->percent = $percent;
    }


    public function render()
    {
        return view('components.product.star');
    }
}
