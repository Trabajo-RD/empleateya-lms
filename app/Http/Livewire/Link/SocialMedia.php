<?php

namespace App\Http\Livewire\Link;

use Livewire\Component;

use App\Models\Link;
use App\Models\LinkCategory;

class SocialMedia extends Component
{


    public function mount(){

    }

    public function render()
    {
        //$links = Link::all();
        // $social_links = $links->where('link_category_id', '=', 1);
        $social_links = Link::where('link_category_id', 1)->get();


        return view('livewire.link.social-media', compact('social_links'));
    }
}
