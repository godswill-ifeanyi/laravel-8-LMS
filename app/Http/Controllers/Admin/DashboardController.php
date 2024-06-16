<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $categories = Category::count();
        $courses = Course::count();
        $instructors = User::where('role_as','2')->count();
        $students = User::where('role_as','3')->count();
        return view('admin.index', compact('categories', 'courses', 'instructors', 'students'));
    }

    
}
