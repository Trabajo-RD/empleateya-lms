<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use Illuminate\Support\Str;

class MicrosoftCourseUnitsToLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $microsoftcourses = json_decode(file_get_contents(storage_path() . "../../public/json/microsoft_learn_catalog.json"), true);

        foreach($microsoftcourses['modules'] as $key => $msmodule) {

            $capacitateSection = DB::table('sections')->where('uid', $msmodule['uid'])->first();

            foreach ($msmodule['units'] as $msModuleUnit) {

                $msModuleUnitUid = $msModuleUnit;

                foreach($microsoftcourses['units'] as $msunit) {
                    if ($msModuleUnitUid === $msunit['uid']) {

                        $unitRecord = Lesson::where('uid', '=', $msunit['uid'])->first();

                        switch($msunit['locale']) {
                            case ('en-en'):
                                $language_id = 1;
                                break;
                            case ('es-es'):
                                $language_id = 2;
                                break;
                            default:
                                $language_id = 1;
                                break;




                        }

                        if ($unitRecord === null) {

                            if ($msunit['uid'] == $msModuleUnitUid) {

                                Lesson::create([
                                    'uid' => $msunit['uid'],
                                    'title' => $msunit['title'],
                                    'slug' => Str::slug($msunit['title']),
                                    'order' => null,
                                    'url' => null,
                                    'iframe' => null,
                                    'duration_in_minutes' => $msunit['duration_in_minutes'],
                                    'section_id' => (!is_null($capacitateSection)) ? $capacitateSection->id : null,
                                    'platform_id' => 1,
                                    'type_id' => 3,
                                    'language_id' => $language_id
                                ]);

                            }
                        }
                    }
                }
            }
        }
    }
}
