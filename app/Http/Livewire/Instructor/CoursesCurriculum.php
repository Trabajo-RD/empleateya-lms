<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;

class CoursesCurriculum extends Component
{
    public $course, $section, $name;

    /**
     * Input edit section validation
     */
    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount( Course $course ){
        $this->course = $course;
        $this->section = new Section();
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
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

        // reset name property value
        $this->reset('name');

        // refresh this course info
        $this->course = Course::find($this->course->id);
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
        $this->section = new Section();

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Section $section){
        $section->delete();
        $this->course = Course::find($this->course->id);
    }

    
}
