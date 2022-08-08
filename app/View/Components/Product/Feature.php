<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Feature extends Component
{

    public string $icon;
    public string $title;
    public string $text;

    public function __construct(string $icon, string $title, string $text)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.feature');
    }
}
