<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        // TODO: OPCION 2 Connect to Microsoft Learning API
        // $microsoft_learn_courses = Http::get('https://docs.microsoft.com/api/contentbrowser/search?environment=prod&locale=es-es&facet=roles&facet=levels&facet=products&facet=resource_type&%24filter=((resource_type%20eq%20%27learning%20path%27))&%24orderBy=popularity%20desc%2Clast_modified%20desc%2Ctitle&%24top=30&showHidden=false');
        // $microsoft_courses = $microsoft_learn_courses->json();

        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id )
            ->orWhere('moderator_id', auth()->user()->id )
            ->orWhere('contributor_id', auth()->user()->id )
            //->latest('id')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function clear(){
        $this->reset('page');
    }
}
