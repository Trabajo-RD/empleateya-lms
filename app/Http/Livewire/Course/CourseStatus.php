<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course;
    public $current; // current user course

    protected $listeners = ['change-lesson' => 'changeLesson'];

    /**
     * Receiving Url Parameters
     *
     * @param   \App\Models\Course    $course
     */
    public function mount(Course $course){

        $this->course = $course;

        // var_dump($this->course->lessons);

        // Return the first incomplete lesson
        if ($this->course->lessons) {
            foreach ($course->lessons as $lesson){

                if (!$lesson->completed){
                    $this->current = $lesson;

                     break;
                }

            }
        }

        // set current to last lesson if all lessons are completed
        if (!$this->current){
            $this->current = $course->lessons->last();
        }

        // Confirm that the user is enrolled in the course they want to access via url
        $this->authorize( 'enrolled', $course );

    }

    public function render()
    {
        return view('livewire.course.course-status');
        // return view('livewire.course.course-status')->layout('layouts.course');
    }

    /*------------ FUNCTIONS -------------*/

    /**
     * Manage the creation and deletion of completed lesson records
     * @since       1.0.0
     * @access      public
     */
    public function completed() {
        if( $this->current->completed ){
            // Delete user lesson complete register
            $this->current->users()->detach( auth()->user()->id );
        } else {
            // Insert user lesson complete register
            $this->current->users()->attach( auth()->user()->id );
        }

        // Update current lesson static property
        // Update course static property
        $this->current = Lesson::find( $this->current->id );
        $this->course = Course::find( $this->course->id );
    }

    /**
     * Actualiza la propiedad current al registro del modelo Lesson actual
     *
     * @param Lesson $lesson
     * @return void
     */
    public function changeLesson( Lesson $lesson ) {
        $this->current = $lesson;
    }


    /*------------ COMPUTED PROPERTIES -------------*/

    /**
     * Propiedad computada para obtener el indice de la lección actual
     */
    public function getIndexProperty() {
        if (!empty($this->current)) {
            return $this->course->lessons->pluck('id')->search( $this->current->id );
        }
    }

    /**
     * Propiedad computada que retorna la lección anterior
     */
    public function getPreviousProperty() {
        if( $this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[ $this->index - 1 ];
        }
    }

    /**
     * Propiedad computada que retorna la leeción siguiente
     */
    public function getNextProperty() {
        if( $this->index == $this->course->lessons->count() - 1 ){
            return null;
        } else {
            return $this->course->lessons[ $this->index + 1 ];
        }
    }

    /**
     * How many lessons the user has marked as completed
     * @since       1.0.0
     * @access      public
     */
    public function getProgressProperty()
    {
        // count complete lessons

            if ($this->course->lessons) {
                $i = 0;

                foreach( $this->course->lessons as $lesson )
                {
                    if( $lesson->completed ){
                        $i++;
                    }
                }

                $progress = ( $i * 100 )/( $this->course->lessons->count() );

                return round( $progress, 2 );
            }

    }

    public function download(){
        return response()->download(storage_path('app/public/' . $this->current->resource->url));
    }
}
