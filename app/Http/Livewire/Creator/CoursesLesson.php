<?php

namespace App\Http\Livewire\Creator;

use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Platform;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url;


    protected $rules = [
        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
    ];

    // Listeners to add SweetAlert event,
    protected $listeners = ['destroy', 'editConfirm', 'edit'];

    public function mount(Section $section){
        $this->section = $section;

        // Show all platforms
        $this->platforms = Platform::all();

        $this->lesson = new Lesson();
    }

    public function render()
    {
        return view('livewire.creator.courses-lesson');
    }


    // Update lesson info
    public function store(){

        $rules = [
            'name' => 'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        ];

        if($this->platform_id == 1 || $this->platform_id == 2){
            $rules['url'] = ['required', false];
        }

        if($this->platform_id == 4){
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate($rules);

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id
        ]);

        // SweetAlert
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Unidad añadida con éxito',
            'text' => '',
        ]);

        $this->reset(['name', 'platform_id', 'url']);

        // Section update
        $this->section = Section::find( $this->section->id );

    }



    /**
     * SweetAlert to confirm edit
     */
    // public function editConfirm(Lesson $lesson){
    //     $this->dispatchBrowserEvent('swal:editlesson', [
    //         'type' => 'warning',
    //         'title' => 'Seguro que quieres editar esta unidad?',
    //         'text' => '',
    //         'lesson' => $lesson,
    //     ]);
    // }

    public function edit( Lesson $lesson ){
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    // Update instructor lesson info
    public function update(){

        // TODO: LinkedIn Learning url validation
        // if( $this->lesson->platform_id == 2 ){
        //     $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?docs.microsoft.com\/(\d+)($|\/)/'];
        // }

        // TODO: Microsoft learn url validation
        // if( $this->lesson->platform_id == 2 ){
        //     $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?docs.microsoft.com\/(\d+)($|\/)/'];
        // }

        // Microsoft Learn Validation
        if( $this->lesson->platform_id == 1 ){
            //$this->rules['lesson.url'] = ['required', 'url', 'not_in:' . 'https://docs.microsoft.com/en-us/learn/'];
            // $this->rules['lesson.url'] = ['required', 'regex:%^ (?:(?:https?|ftp|file):\/\/|www\.|ftp\.)(?:\(?: docs\.microsoft\.com (?: /en-us/learn/paths/ | /es-mx/learn/paths/ | /es-es/learn/paths/ ) )*([-A-Z0-9+&@#\/%=~_|$?!:,.]) $%x'];
            $this->rules['lesson.url'] = ['required', false];
        }

        // Linkedin Learning validation
        if( $this->lesson->platform_id == 2 ){
            $this->rules['lesson.url'] = ['required', false];
        }

        // Vimeo url validation
        if( $this->lesson->platform_id == 4 ){
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();

        $this->lesson->save();

        // SweetAlert
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Unidad actualizada!',
            'text' => '',
        ]);

        // Clear lesson property
        $this->lesson = new Lesson();

        // Section update
        $this->section = Section::find( $this->section->id );

    }


    /**
     * Return delete confirm
     */
    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Seguro que quires eliminar esta unidad?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function destroy( $id ){

        Lesson::where('id', $id)->delete();
        //$lesson->delete();

        // Section update
        $this->section = Section::find( $this->section->id );

    }

    // Cancel edit lesson form
    public function cancel(){
        $this->lesson = new Lesson();
    }
}
