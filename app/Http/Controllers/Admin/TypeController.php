<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        // return $request->name;

        $request->validate([
            'name' => 'required|unique:types'
        ]);

        $data = $request->all();

        $type = Type::create([
            'name' => $data['name']
        ]);

        // dd($type);

        // return $type;

        return redirect()->route('admin.types.edit', compact('locale', 'type'))->with('info', 'Se ha creado un nuevo tipo de curso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Type $type)
    {
        //return $type;
        //$type = Type::find($type->id);
        return view('admin.types.edit', compact('locale', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, Type $type)
    {
        // return $type;

        $request->validate([
            'name' => 'required|unique:types,name,' . $type->id
        ]);

        $data = $request->all();

        $type->update([
            'name' => $data['name']
        ]);

        // $type->update([
        //     'name' => $request->name
        // ]);

        return redirect()->route('admin.types.edit', compact('locale', 'type'))->with('info', 'Se ha actualizado el tipo de curso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('delete', 'success');
    }
}
