<?php

namespace App\Http\Livewire\Creator;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $name;

    /**
     * Input edit section validation
     */
     protected $rules = [
        'section.name' => 'required'
    ];

    // Listeners to add SweetAlert event,
    protected $listeners = ['destroy', 'editConfirm', 'edit'];

    public function mount( Course $course ){
        $this->course = $course;
        $this->section = new Section();

        // Policy to check if an instructor is modifying a course created by another instructor
        $this->authorize('dictated', $course);
    }

    public function render()
    {
        return view('livewire.creator.courses-curriculum')->layout('layouts.creator', ['course' => $this->course ]);
    }

    /**
     * Create new section
     */
     public function store(){

        // to evaluate property $rules
        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        // SweetAlert
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Módulo agregado con éxito',
            'text' => '',
        ]);

        // reset name property value
        $this->reset('name');

        // refresh this course info
        $this->course = Course::find($this->course->id);
    }

    /**
     * SweetAlert to confirm edit
     */
    public function editConfirm(Section $section){
        $this->dispatchBrowserEvent('swal:edit', [
            'type' => 'warning',
            'title' => 'Estas seguro de editar este título?',
            'text' => '',
            'section' => $section,
        ]);
    }

    /**
     * Show input to edit current section name
     */
    public function edit( Section $section ){
        $this->section = $section;
    }

    public function update(){

         // to evaluate property $rules
        $this->validate();
        $this->section->save();

        // SweetAlert
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Módulo actualizado!',
            'text' => '',
        ]);

        $this->section = new Section();

        $this->course = Course::find($this->course->id);
    }

    /**
     * Return delete confirm
     */
    public function deleteModuleConfirm($id){
        $this->dispatchBrowserEvent('swal:deletemoduleconfirm', [
            'type' => 'warning',
            'title' => 'Estas seguro de eliminar este módulo?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function destroy($id){

        Section::where('id', $id)->delete();

        // refresh this course info
        $this->course = Course::find($this->course->id);

        // $section->delete();
        // $this->course = Course::find($this->course->id);
    }
}
