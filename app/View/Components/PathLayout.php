<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PathLayout extends Component
{
    public $path;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.path');
    }
}
