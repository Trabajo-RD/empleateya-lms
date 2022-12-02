<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();

        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create');
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
            'title' => 'required|unique:slides'
        ]);

        $data = $request->all();

        $slide = Slide::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'title_color' => $data['title_color'],
            'title_color_saturation' => $data['title_color_saturation'],
            'content_color' => $data['content_color'],
            'content_color_saturation' => $data['content_color_saturation'],
            'background_color' => $data['background_color'],
            'background_color_saturation' => $data['background_color_saturation'],
            'background_color_opacity' => $data['background_color_opacity'],
            'link' => $data['link'],
            'link_text' => $data['link_text'],
            'link_type' => $data['link_type'],
            'link_color' => $data['link_color'],
            'link_color_saturation' => $data['link_color_saturation'],
            'link_bg_color' => $data['link_bg_color'],
            'link_bg_color_saturation' => $data['link_bg_color_saturation'],
            'information' => $data['information'],
            'target' => $data['target'],
            'status' => $data['status'],
        ]);

        if($request->file('file')){
            $url = Storage::put('slides', $request->file('file'));

            $slide->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.slides.edit', compact('slide') )->with('info', __('Slide created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        return view('admin.slides.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title' => 'required|unique:slides,title,' . $slide->id
        ]);

        $data = $request->all();

        $slide_id = $data['id'];

        $slide->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'title_color' => $data['title_color'],
            'title_color_saturation' => $data['title_color_saturation'],
            'content_color' => $data['content_color'],
            'content_color_saturation' => $data['content_color_saturation'],
            'background_color' => $data['background_color'],
            'background_color_saturation' => $data['background_color_saturation'],
            'background_color_opacity' => $data['background_color_opacity'],
            'link' => $data['link'],
            'link_text' => $data['link_text'],
            'link_type' => $data['link_type'],
            'link_color' => $data['link_color'],
            'link_color_saturation' => $data['link_color_saturation'],
            'link_bg_color' => $data['link_bg_color'],
            'link_bg_color_saturation' => $data['link_bg_color_saturation'],
            'information' => $data['information'],
            'target' => $data['target'],
            'status' => $data['status'],
        ]);

        if( $request->file('file') ){
            $image = $request->file('file');
            // $name_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 23264564.jpg

            // $image = Image::make($image)->resize(1024, 700);

            $url = Storage::put('slides', $image);

            if( $slide->image ){
                Storage::delete($slide->image->url);

                $slide->image->update([
                    'url' => $url
                ]);
            } else {
                $slide->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.slides.edit', compact('slide') )->with('info', __('The slide has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();

        return redirect()->route('admin.slides.index')->with('delete', 'success');
    }
}
