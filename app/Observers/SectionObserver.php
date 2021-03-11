<?php

namespace App\Observers;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    public function deleting( Section $section ){

        foreach( $section->lessons as $lesson ){

            if( $lesson->resource ){

                // Delete resource on storage/app/public/resources
                Storage::delete( $lesson->resource->url );

                // Delete database resource table register
                $lesson->resource->delete();

            }

        }

    }
}
