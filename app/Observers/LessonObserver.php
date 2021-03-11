<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    // fires when a record in the Lesson table is created
    public function creating( Lesson $lesson ){

        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        // TODO: Switch

        if( $platform_id == 3 ){
            // youtube iframe
            $pattern = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($pattern, $url, $part);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $part[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        if( $platform_id == 4 ){
            // vimeo iframe
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($pattern, $url, $part);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $part[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }
    }


    // fires when a record in the Lesson table is updated
    public function updating( Lesson $lesson ){

        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        // TODO: Switch

        if( $platform_id == 3 ){
            // youtube iframe
            $pattern = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($pattern, $url, $part);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $part[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        if( $platform_id == 4 ){
            // vimeo iframe
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($pattern, $url, $part);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $part[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }

    }

    public function deleting( Lesson $lesson ){
        // If have resource
        if( $lesson->resource ){

            // Delete resource
            Storage::delete( $lesson->resource->url );

            // Delete database resource table register
            $lesson->resource->delete();
        }
    }
}
