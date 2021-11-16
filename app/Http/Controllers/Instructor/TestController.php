<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Answer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $sections = Section::with(['tests' => function ($query) {
            $query->inRandomOrder()
                ->with(['tests' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('tests')
            ->get();

        return view('instructor.courses.tests.index', compact('sections'));
    }

    public function store(Request $request)
    {
        $answers = Answer::find(array_values($request->input('questions')));

        $result = auth()->user()->results()->create([
            'score' => $answers->sum('points')
        ]);

        $questions = $answers->mapWithKeys(function ($answer) {
            return [
                $answer->question_id => [
                    'answer_id' => $answer->id,
                    'points' => $answer->points
                ]
            ];
        })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('instructor.tests.results.show', $result->id);
    }
}
