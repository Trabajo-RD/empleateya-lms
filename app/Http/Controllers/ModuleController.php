<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Spatie\Permission\Models\Role;

class ModuleController extends Controller
{
    public function index()
    {
        return view('modules.index');
    }

    public function show(Module $module) {
        // show only published modules
        $this->authorize('published', $module);

        // Increment view count
        Module::find($module->id)->increment('views');

        $related_modules = Module::where('id', '!=', $module->id)->topic($module->topic->id)->take(5)->get();

        return view('modules.show', compact('module', 'related_modules'));
    }

    /**
     * Retorna la vista donde el alumno podrá llevar el avance de un módulo. Por el momento el control de esta vista lo tendrá el componente Livewire/Modules/ModuleStatus
     *
     * @param   \App\Models\Module   $module
     */
    // public function status(Module $module)
    // {
    //     return view('modules.status', compact('module'));
    // }

    public function enrollment(Module $module)
    {
        return view('modules.enrollment', compact('module'));
    }

    public function enrolled(Module $module)
    {
        // get auth user data
        $user = auth()->user();

        // insert auth user id in module_user table
        $module->users()->attach( $user->id );

        // Determine if a user has a certain role
        if(!$user->hasRole('Student'))
        {
            $user->assignRole('Student');
        }

        return redirect()->route('modules.status', $module)->with('success', 'Tu inscripción se ha realizado satisfactoriamente! Aquí podrás llevar el avance de este modulo, y podrás ver este y otros más en la sección Mi Aprendizaje');
    }
}
