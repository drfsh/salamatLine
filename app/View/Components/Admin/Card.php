<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $color;
    public string $icon;
    public string $subtitle;
    public string $title;
    public string $footer;


    public function __construct(string $color = 'y18', string $icon = 'fas fa-cubes', string $subtitle ="", string $title ="",string $footer ="")
    {
        $this->color = $color;
        $this->icon = $icon;
        $this->subtitle = $subtitle;
        $this->title = $title;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.card');
    }
}
