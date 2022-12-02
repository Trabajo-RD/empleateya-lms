<?php

namespace App\Http\Livewire\LearningPath;

use Livewire\Component;
use App\Models\LearningPath;
use App\Models\Unit;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LearningPathStatus extends Component
{
    use AuthorizesRequests;

    public $path; // route parameter {path}
    public $current;

    /**
     * Receiving Url Parameters
     *
     * @param   \App\Models\LearningPath    $path
     */
    public function mount(LearningPath $path)
    {
        $this->path = $path;

        foreach ($path->units as $unit) {
            if (!$unit->completed){
                $this->current = $unit;

                break;
            }
        }

        // show path only to enrolled users
        $this->authorize('learningPathEnrolled', $path);
    }

    public function render()
    {
        return view('livewire.learning-path.learning-path-status');
        // return view('livewire.learning-path.learning-path-status')->layout('layouts.path');
    }

    /**
     * Actualiza el valor de la propiedad current al registro actual del modelo Unit
     *
     * @param Unit $unit
     * @return void
     */
    public function changeUnit(Unit $unit){
        $this->current = $unit;

        $this->index = $this->path->units->pluck('id')->search($unit);
    }
}
