<?php

namespace App\Http\Controllers;
use App\Course;

class CourseController extends Controller
{
    public function show(Course $course){
        $course->Load([
            'category' => function($q){
                $q->select('id', 'name');
            },
            'goals' => function($q){
                $q -> select('id', 'course_id', 'goal');
            },
            'level' => function($q){
                $q -> select('id', 'name');
            },
            'requirements' => function($q){
                $q ->select('id', 'id', 'requirement');
            },
            'reviews.user',
            'teacher'
        ])->withCount(['students', 'reviews'])->get();
        $related = $course->relatedCourses($course);
        return view('courses.detail', compact('course', 'related'));
    }    
}
