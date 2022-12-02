<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use App\Models\Type;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Scorm;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SectionScormController extends Controller
{
    public function index(Section $section) {
        $scorms = $section->scorms;

        $scorm_formats = [
            "scorm-1-2" => 'SCORM 1.2'
        ];

        return view('instructor.dashboard.courses.sections.scorms.index', compact('section', 'scorms', 'scorm_formats'));
    }

    public function create(Section $section) {
        $ratios = [
            '1024x576 (16:9)',
            '720x540 (4:3)'
        ];

        return view('instructor.dashboard.courses.sections.scorms.create', compact('section', 'ratios'));
    }

    // public function upload(Request $request) {
    //     $request->validate([
    //         'origin_file' => 'required'
    //     ]);
    // }

    /**
     * Store a new lesson in the database
     *
     * @param Request $request
     * @param Section $section
     * @return void
     */
    public function store(Request $request, Section $section) {

        $user = User::find(auth()->user()->id); // 404
        
        // Validate the user
        if (!$user) {
            return;
        }

        // Validate the request
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:scorms',
            'origin_file' => 'required'
        ]);

        // scorm file
        $file = $request->file('origin_file');

        $original_name = $file->getClientOriginalName();
        $file_name_without_ext = str_replace('.zip', '', $original_name);
        $original_ext = $file->getClientOriginalExtension();

        // $file_name_parts = explode('-', $file_name_without_ext);
        // $identifier = end($file_name_parts);

        if (!$original_ext == 'zip') {
            return redirect()->back()->with('error', 'El paquete SCORM se debe subir en formato ZIP');
        } else {

            try {

                // $scorm_dir_name = $file_name_without_ext;

                // zip object
                $zip = new ZipArchive();

                // open zip
                $status = $zip->open($file->getRealPath());

                if ($status !== true) {
                    throw new \Exception($status);
                } else {

                    // storage path
                    $storageDestinationPath = storage_path('app/public/scorm/' . $file_name_without_ext);

                    if (!File::exists( $storageDestinationPath )) {

                        File::makeDirectory( $storageDestinationPath, 0777, true);

                    }

                    $unzipped = $zip->extractTo( $storageDestinationPath );

                    $zip->close();

                    if($unzipped) {

                        $manifestFileName = 'imsmanifest.xml'; // manifest file name
                        // $manifestFile = $storageDestinationPath .'/'. $manifestFileName; // SCORM package manifest file
                        // var_dump($manifestFile); return;

                        $manifestInfo = getManifestInfo($storageDestinationPath, $manifestFileName);

                        $scorm_data =  [
                                "title" => $request->title,
                                "root" => $file_name_without_ext,
                                "index" => 'scormdriver/indexAPI.html',
                                "cpv" => $manifestInfo->cpv
                        ];

                        $json_scorm_data = json_encode($scorm_data);

                        $base64_scorm_data = base64_encode($json_scorm_data);

                        $section->scorms()->create([
                            'uuid' => Str::orderedUuid(),
                            'title' => $request->title,
                            'slug' => ($request->slug != '') ? $request->slug : Str::slug($request->title),
                            'origin_file' =>$storageDestinationPath,
                            'data_from_lms' => $manifestInfo->cpv,
                            'entry_url' => (!empty($request->entry_url)) ? $request->entry_url : null,
                            'version' => $manifestInfo->version,
                            'identifier' => $manifestInfo->identifier,
                            'ratio' => (!empty($request->ratio)) ? $request->ratio : null,
                            'data' => $base64_scorm_data
                        ]);

                        $manifestInfo->courseRoot = $file_name_without_ext;

                        $json = array(
                            "data" => [
                                "title" => $request->title,
                                "cpv" => $manifestInfo->cpv,
                                "rld" => false,
                                "organization" => $request->title,
                                "version" => $manifestInfo->version,
                                "schema" => "ADL SCORM",
                                "scormIndex" => "scormdriver/indexAPI.html",
                                "courseRoot" => $storageDestinationPath
                            ]
                         );

                        // $data = array($row);
                        $stored = json_encode($json);

                        // echo print_r($stored);

                        file_put_contents($storageDestinationPath .'/'. 'data.json',  $stored);

                        return redirect()->route('instructor.dashboard.courses.sections.scorm.index', ['section' => $section])->with('success', 'Paquete SCORM añadido correctamente');

                    }

                }

            } catch (\Exception $e) {

                Log::debug($e->getMessage());

                return redirect()->route('instructor.dashboard.courses.sections.scorm.index', $section)->with('error', 'Ha ocurrido un error al momento de guardar la información');

            }
        }

            // $path = $file->storeAs('scorm', $file_name);



    }

    public function show(Scorm $scorm) {

    }

    public function edit(Scorm $scorm) {
        $ratios = [
            '1024-576' => '1024x576 (16:9)',
            '720-540' => '720x540 (4:3)'
        ];

        return view('instructor.dashboard.courses.sections.scorms.edit', compact('scorm', 'ratios'));
    }

    /**
     * Update SCORM course
     *
     * @param Request $request
     * @param Scorm $scorm
     * @return void
     */
    public function update(Request $request, Scorm $scorm) {

        $user = User::find(auth()->user()->id);

        // validate user
        if (!$user) {
            return;
        }

        $section = $scorm->scormable;

        // validate inputs
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:scorms,slug,' . $scorm->id,
            'origin_file' => 'required'
        ]);

        // scorm file
        $file = $request->file('origin_file');

        $original_name = $file->getClientOriginalName();
        $file_name_without_ext = str_replace('.zip', '', $original_name);
        $original_ext = $file->getClientOriginalExtension();

        if (!$original_ext == 'zip') {

            return redirect()->back()->with('error', 'El paquete SCORM se debe subir en formato ZIP');

        } else {

            try {

                // zip object
                $zip = new ZipArchive();

                // open zip
                $status = $zip->open( $file->getRealPath() );

                if ($status != true) {
                    throw new \Exception($status);
                } else {

                    // storage path
                    $storageDestinationPath = storage_path('app/public/scorm/' . $file_name_without_ext);

                    if ($storageDestinationPath != $scorm->origin_file) {
                        return redirect()->route('instructor.dashboard.courses.sections.scorm.index', $section)->with('error', 'El paquete SCORM no coincide con el aterior');
                    }

                    if (!File::exists( $storageDestinationPath )) {

                        File::makeDirectory( $storageDestinationPath, 0777, true );

                    } else {

                        // Delete previous scorm directory
                        // Storage::delete($scorm->origin_file);

                        File::deleteDirectory($storageDestinationPath);

                        // Create new scorm directory
                        File::makeDirectory( $storageDestinationPath, 0777, true );

                    }

                    // unzip content
                    $unzipped = $zip->extractTo( $storageDestinationPath );

                    // close zip
                    $zip->close();

                    if ($unzipped) {

                        $manifestFileName = 'imsmanifest.xml';

                        $manifestInfo = getManifestInfo($storageDestinationPath, $manifestFileName);

                        $scorm_data =  [
                            "title" => $request->title,
                            "root" => $file_name_without_ext,
                            "index" => 'scormdriver/indexAPI.html',
                            "cpv" => $manifestInfo->cpv
                        ];

                        $json_scorm_data = json_encode($scorm_data);

                        $base64_scorm_data = base64_encode($json_scorm_data);

                        $section->scorms()->update([
                            'title' => $request->title,
                            'slug' => $request->slug,
                            'origin_file' =>$storageDestinationPath,
                            'data_from_lms' => $manifestInfo->cpv,
                            'entry_url' => (!empty($request->entry_url)) ? $request->entry_url : null,
                            'version' => $manifestInfo->version,
                            'identifier' => $manifestInfo->identifier,
                            'ratio' => (!empty($request->ratio)) ? $request->ratio : null,
                            'data' => $base64_scorm_data
                        ]);

                        $manifestInfo->courseRoot = $file_name_without_ext;

                        $json = array(
                            "data" => [
                                "title" => $request->title,
                                "cpv" => $manifestInfo->cpv,
                                "rld" => false,
                                "organization" => $request->title,
                                "version" => $manifestInfo->version,
                                "schema" => "ADL SCORM",
                                "scormIndex" => "scormdriver/indexAPI.html",
                                "courseRoot" => $storageDestinationPath
                            ]
                        );

                        // $data = array($row);
                        $stored = json_encode($json);

                        // echo print_r($stored);

                        file_put_contents($storageDestinationPath .'/'. 'data.json',  $stored);

                        return redirect()->route('instructor.dashboard.courses.sections.scorm.index', ['section' => $section])->with('success', 'Paquete SCORM actualizado correctamente');

                    }
                }

            } catch (\Exception $e) {

                Log::debug( $e->getMessage() );

                return redirect()->route('instructor.dashboard.courses.sections.scorm.index', $section)->with('error', 'Ha ocurrido un error al momento de guardar la información');

            }
        }

    }

    public function destroy(Scorm $scorm) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $section = $scorm->scormable;

        Storage::delete($scorm->origin_file);

        $scorm->delete();

        return redirect()->route('instructor.dashboard.courses.sections.index', $section)->with('delete', 'success');
    }
}
