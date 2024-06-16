<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $top_courses = Course::where('status','1')->where('top_course','1')->get();
        $all_courses = Course::where('status','1')->get();
        $setting = Setting::find(1);
        return view('front.index', compact('top_courses','all_courses','setting'));
    }

    public function show($category_slug,$course_slug) {
        $settings = Setting::find(1);
        $category = Category::where('slug',$category_slug)->where('status','1')->first();
        
        if ($category) {
            $all_courses = Course::where('slug','!=',$course_slug)->where('category_id',$category->id)->where('status','1')->take(5)->get();
            $course = Course::where('slug',$course_slug)->where('category_id',$category->id)->where('status','1')->first();
            return view('front.course.show', compact('category','course','all_courses','settings'));
        }
    }
    
}
