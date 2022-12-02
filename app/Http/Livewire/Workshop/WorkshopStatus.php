<?php

namespace App\Http\Livewire\Workshop;

use Livewire\Component;
use App\Models\Workshop;
use App\Models\Task;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WorkshopStatus extends Component
{
    use AuthorizesRequests;

    public $workshop; // route parameter {workshop}
    public $current;

    protected $listeners = ['change-task' => 'changeTask'];

    /**
     * Receiving Url Parameters
     *
     * @param   \App\Models\Workshop    $workshop
     */
    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;

        foreach ($workshop->tasks as $task){
            if (!$task->completed){
                $this->current = $task;

                break;
            }
        }

        // set current to last task if all tasks are completed
        if (!$this->current){
            $this->current = $workshop->tasks->last();
        }

        // show workshop only to enrolled users
        $this->authorize('workshopEnrolled', $workshop);
    }

    public function render()
    {
        return view('livewire.workshop.workshop-status');
        // return view('livewire.workshop.workshop-status')->layout('layouts.workshop');
    }

    public function completed(){
        if ($this->current->completed) {
            $this->current->users()->detach( auth()->user()->id );
        } else {
            $this->current->users()->attach( auth()->user()->id );
        }

        // renderiza buscando el id que coincida con la asignacion actual
        $this->current = Task::find( $this->current->id );
        $this->workshop = Workshop::find( $this->workshop->id );
    }

    /**
     * Actualiza la propiedad current al registro del modelo Task actual
     *
     * @param Task $task
     * @return void
     */
    public function changeTask(Task $task){
        $this->current = $task;
    }

    /**
     * Propiedad computada que retorna el indice de la asignacion actual
     *
     * @return void
     */
    public function getIndexProperty(){
        return $this->workshop->tasks->pluck('id')->search($this->current->id);
    }

    /**
     * Propiedad computada que retorna el indice de la asignacion previa
     *
     * @return void
     */
    public function getPreviousProperty(){
        // Set index in null if index == 0 prevent -1 index
        if($this->index == 0){
            return null;
        } else {
            return $this->workshop->tasks[$this->index - 1];
        }
    }

    /**
     * Propiedad computada que retorna el indice de la asignacion final
     *
     * @return void
     */
    public function getNextProperty(){
        if ($this->index == $this->workshop->tasks->count() - 1){
            return null;
        } else {
            return $this->workshop->tasks[$this->index + 1];
        }
    }

    public function getProgressProperty() {
        $i = 0;

        // completed tasks
        foreach ($this->workshop->tasks as $task) {
            if ($task->completed) {
                $i++;
            }
        }

        $progress = ($i * 100) / ($this->workshop->tasks->count());

        return round( $progress, 2);
    }
}
