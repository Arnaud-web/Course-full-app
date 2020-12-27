<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CourseController extends Controller
{
    //

    public function index()
    {

        // $courses = Course::all();
        $courses = Course::with('user')
        ->select('courses.*', DB::raw(
            ' ( SELECT COUNT (DISTINCT(user_id))
            FROM completions
            INNER JOIN episodes ON completions.episode_id = episodes.id
            WHERE episodes.course_id = courses.id  
            ) AS participants '
        ))
        ->withCount('episodes')->latest()->get();
        // dd($courses);
        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }

    public function show(int $id)
    {
        $course = Course::where('id', $id)->with('episodes')->first();
        $watched = auth()->user()->episodes;
        return Inertia::render(
            'Courses/Show',
            [
                'course' => $course,
                'watched' => $watched
            ]
        );
    }

    public function episodes()
    {
        return $this->belongsTo(Episode::class, 'completions', 'user_id', 'episode_id');
    }
    public function toggleProgress(Request $request)
    {
        $id = $request->input('episodeId');
        $user = auth()->user();
        $user->episodes()->toggle($id);
        return $user->episodes;
    }
}
