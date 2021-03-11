<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course;
    public $current;

    /**
     * mount() : Asigned parameters manually
     */
    public function mount( Course $course ){

        // Capture the slug of current course
        $this->course = $course;

        // Return the first incomplete lesson
        foreach( $course->lessons as $lesson ){
            if( !$lesson->completed ){
                $this->current = $lesson;     
                break;
            }
        }

        if( ! $this->current ){
            // In case of having completed all the lessons, assign the last lesson to the current property           
            $this->current = $course->lessons->last();
        }

        // Confirm that the user is enrolled in the course they want to access via url
        $this->authorize( 'enrolled', $course );

    }

    public function render()
    {
        return view('livewire.course-status');
    }

    /*------------ FUNCTIONS -------------*/

    public function changeLesson( Lesson $lesson )
    {
        return $this->current = $lesson;        
    }

    /**
     * Manage the creation and deletion of completed lesson records
     * @since       1.0.0
     * @access      public
     */
    public function completed()
    {
        if($this->current->completed){
            // Delete user lesson complete register
            $this->current->users()->detach( auth()->user()->id );
        } else {
            // Insert user lesson complete register
            $this->current->users()->attach( auth()->user()->id );
        }

        // Update current lesson static property
        // Update course static property
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }


    /*------------ COMPUTED PROPERTIES -------------*/

    /**
     * Obtain the current lesson index
     */
    public function getIndexProperty(){
        // pluck() : crea una coleccion a partir de una ya existente, pero solo con el id o otro parametro
       return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if( $this->index == 0){
            return null;
        } else {
            return $this->course->lessons[ $this->index - 1 ];
        }
    }

    public function getNextProperty(){
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
    public function getAdvanceProperty(){
        // 
        $i = 0;

        foreach( $this->course->lessons as $lesson ){
            if( $lesson->completed ){
                $i++;
            }
        }

        $advance = ( $i * 100 ) / ( $this->course->lessons->count() );

        return round( $advance, 2 );
    }
}
