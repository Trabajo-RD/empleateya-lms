<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Partner;

use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $request->validate([
            'name' => 'required|unique:partners',
        ]);

        $partner = Partner::create( $request->all() );

        if($request->file('file') ){
            $url = Storage::put('partners', $request->file('file'));

            $partner->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.partners.edit', compact('partner'))->with('info', 'Se ha creado una nueva asociación.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|unique:partners,name,' . $partner->id,
        ]);

        $partner->update( $request->all() );

        if( $request->file('file') ){
            $url = Storage::put('partners', $request->file('file') );

            if( $partner->image ){
                Storage::delete($partner->image->url);

                $partner->image->update([
                    'url' => $url
                ]);
            } else {
                $partner->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.partners.edit', compact('partner'))->with('info', 'Se han actualizado los datos de la asociación.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('info', 'La asociación ha sido eliminada correctamente.');
    }
}
