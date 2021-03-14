<?php

namespace App\Http\Livewire\Creator;

use Livewire\Component;
use App\Models\Lesson;

// To delete picture when destroy
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount( Lesson $lesson ){
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.creator.lesson-resources');
    }

    public function save(){
        $this->validate([
            'file' => 'required'
        ]);

        // copy this file to storage/app/public/resources
        $url = $this->file->store('resources');

        $this->lesson->resource()->create([
            'url' => $url
        ]);

        $this->lesson = Lesson::find( $this->lesson->id );
    }

    public function destroy(){

        // Delete resource storage/app/public/resources
        Storage::delete( $this->lesson->resource->url );

        $this->lesson->resource->delete();

        $this->lesson = Lesson::find( $this->lesson->id );
    }

    public function download(){
        return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
    }
}
