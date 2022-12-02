<?php

namespace App\Http\Livewire\Module;

use Livewire\Component;
use App\Models\Module;
use App\Models\Unit;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModuleStatus extends Component
{

    use AuthorizesRequests;

    public $module;
    public $current; // current user module

    protected $listeners = ['change-unit' => 'changeUnit'];

    /**
     * Receiving Url Parameters
     *
     * @param   \App\Models\Module    $module
     */
    public function mount(Module $module)
    {
        $this->module = $module;

        // Return the first incomplete unit
        foreach( $module->units as $unit ){
            if( !$unit->completed ) {
                $this->current = $unit;

                break;
            }
        }

        // set current to last unit if all units are completed
        if( !$this->current ) {
            $this->current = $module->units->last();
        }

        // show module only to enrolled users
        $this->authorize('moduleEnrolled', $module);
    }

    public function render() {
        return view('livewire.module.module-status');
    }

    /*--------------- METHODS ----------------------*/

    /**
     * Manage the creation and deletion of completed unit records
     * @since       1.0.0
     * @access      public
     */
    public function completed() {
        if( $this->current->completed ) {
            // delete from unit user table
            $this->current->users()->detach( auth()->user()->id );
        } else {
            // add to unit user table
            $this->current->users()->attach( auth()->user()->id );
        }

        // renderiza buscando el id que coincida con la asignacion actual
        $this->current = Unit::find( $this->current->id );
        $this->module = Module::find( $this->module->id );
    }

    /**
     * Actualiza la propiedad current al registro del modelo Unit actual
     *
     * @param Unit $unit
     * @return void
     */
    public function changeUnit(Unit $unit) {
        $this->current = $unit;
    }

    /*--------------- COMPUTED PROPERTIES ---------------*/

    /**
     * Propiedad computada para obtener el indice de la unidad actual
     */
    public function getIndexProperty() {
        if( !is_null($this->module->units ) ) {
            return $this->module->units->pluck('id')->search( $this->current->id );
        }
    }

    /**
     * Propiedad computada que retorna la unidad anterior
     */
    public function getPreviousProperty() {
        if( $this->index == 0 ) {
            return null;
        } else {
            return $this->module->units[ $this->index - 1 ];
        }
    }

    /**
     * Propiedad computada que retorna la unidad siguiente
     *
     * @since       1.0.0
     * @access      public
     */
    public function getNextProperty() {
        if( $this->index == $this->module->units->count() - 1 ) {
            return null;
        } else {
            return $this->module->units[ $this->index + 1 ];
        }
    }

    /**
     * How many units the user has marked as completed
     * @since       1.0.0
     * @access      public
     */
    public function getProgressProperty()
    {
        $i = 0;

        // completed units
        foreach( $this->module->units as $unit ) {
            if( $unit->completed ){
                $i++;
            }
        }

        $progress = ($i * 100) / ($this->module->units->count());

        return round( $progress, 2 );
    }

}
