<?php

namespace App\Http\Livewire\Instructor\Courses\Sections\Scorms;

use Livewire\Component;
use App\Models\Section;
use Illuminate\Http\Request;

use Livewire\WithFileUploads;
use ZipArchive;

// use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;


class SectionScorms extends Component
{
    use WithFileUploads;

    public $section;
    public $origin_file, $title, $version, $identifier;

    public function mount(Section $section) {
        $this->section = $section;
    }

    public function render()
    {

        $ratios = [
            '1024x576 (16:9)',
            '720x540 (4:3)'
        ];

        return view('livewire.instructor.courses.sections.scorms.section-scorms', compact('ratios'));
    }

    /**
     * Upload an unzip SCORM package
     *
     * @return void
     */
    public function save(Request $request) {

        $file = $request->file($this->origin_file);

        // get the original file name
        $file_name = $file->getClientOriginalName();
        // get the original file extension
        $file_ex = $file->getClientOriginalExtension();

        $this->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:scorms',
            'origin_file' => 'required|file',
            'version' => 'required',
            'identifier' => 'required'
        ]);


        // mover desde la carpeta temporal a la carpeta scorm
        $file_url = $this->origin_file->storeAs('scorm', $file_name);

        // almacenar registro en la tabla scorm
        $this->section->scorms()->create([
            'title' => $this->title,
            'origin_file' => $file_url,
            'version' => $this->version,
            'identifier' => $this->identifier
        ]);





    }
}
