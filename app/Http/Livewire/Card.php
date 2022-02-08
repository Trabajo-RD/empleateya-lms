<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $title;
    public $subtitle;
    public $text;
    public $links;

    public function render()
    {
        return view('livewire.card');
    }
}
