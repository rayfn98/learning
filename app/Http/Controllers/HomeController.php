<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
    }

    public function index()
    {
        $courses = Course::withCount(['students'])
            ->with('category', 'students', 'teacher', 'reviews')
            ->where('status', Course::PUBLISHED)
            ->latest()//Ordenar des, los ultimos creados primero
            ->paginate(12);
        return view('home', compact('courses'));
    }
}
