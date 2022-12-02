<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Workshop;

class WorkshopLayout extends Component
{
    public $workshop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.workshop');
    }
}
