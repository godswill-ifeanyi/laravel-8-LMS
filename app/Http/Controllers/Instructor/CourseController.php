<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CourseFormRequest;

class CourseController extends Controller
{
    public function index() {
        $pending_courses = Course::where('created_by',Auth::user()->id)->where('status','0')->get();
        $active_courses = Course::where('created_by',Auth::user()->id)->where('status','1')->get();
        return view('instructor.course.index', compact('pending_courses','active_courses'));
    }

    public function create() {
        $categories = Category::where('status','1')->get();
        return view('instructor.course.create', compact('categories'));
    }

    public function store(CourseFormRequest $request) {
        $validatedData = $request->validated();

        $course = new Course;

        $course->name = $validatedData['name'];
        $course->slug = Str::slug($validatedData['name']);
        $course->description = $validatedData['description'];
        $course->short_description = $validatedData['short_description'];
        $course->yt_iframe = $validatedData['yt_iframe'];
        $course->requirements = $validatedData['requirements'];
        $course->outcome = $validatedData['outcome'];
        $course->level = $validatedData['level'];
        $course->category_id = $validatedData['category_id'];
        $course->original_price = $validatedData['original_price'];
        $course->discount_price = $validatedData['discount_price'] == null ? '0' : $validatedData['discount_price'];

        if ($request->hasfile('image')) {
            $file = $validatedData['image'];
            $filename = uniqid() .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/course/', $filename);
            $course->image_path = $filename;
        }

        $course->meta_keywords = $validatedData['meta_keywords'];
        $course->meta_title = $validatedData['name'];
        $course->meta_description = $validatedData['meta_description'];
        $course->status = $request->status == null ? '0' : '1';
        $course->top_course = $request->top_course == null ? '0' : '1';
        $course->free_course = $request->free_course == true ? '1' : '0';
        $course->created_by = Auth::user()->id;

        $course->save();

        return redirect('instructor/courses')->with('message', 'Course Added Successfully');
    }

    public function show($course_id) {
        $course = Course::find($course_id);
        return view('instructor.course.show', compact('course'));
    }

    public function edit($course_id) {
        $course = Course::find($course_id);
        $categories = Category::all();
        return view('instructor.course.edit', compact('course','categories'));
    }

    public function update(Request $request, $course_id) {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'name' => ['required','string','max:200'],
            'slug' => ['nullable','string','max:200'],
            'short_description' => ['required'],
            'description' => ['required'],
            'image' => ['nullable','mimes:jpg,png,jpeg'],
            'top_course' => ['nullable'],
            'free_course' => ['nullable'],
            'meta_title' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keywords' => ['nullable'],
            'level' => ['required'],
            'yt_iframe' => ['nullable'],
            'status' => ['nullable'],
            'requirements' => ['required'],
            'outcome' => ['required'],
            'original_price' => ['required'],
            'discount_price' => ['nullable'],
        ]); 

        $course = Course::find($course_id);

        $course->name = $validatedData['name'];
        $course->slug = Str::slug($validatedData['name']);
        $course->description = $validatedData['description'];
        $course->short_description = $validatedData['short_description'];
        $course->yt_iframe = $validatedData['yt_iframe'];
        $course->requirements = $validatedData['requirements'];
        $course->outcome = $validatedData['outcome'];
        $course->level = $validatedData['level'];
        $course->category_id = $validatedData['category_id'];
        $course->original_price = $validatedData['original_price'];
        $course->discount_price = $validatedData['discount_price'] == null ? '0' : $validatedData['discount_price'];

        if ($request->hasfile('image')) {
            $destination = 'uploads/course/'.$course->image_path;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $validatedData['image'];
            $filename = uniqid() .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('uploads/course/'), $filename);
            $course->image_path = $filename;
        }

        $course->meta_keywords = $validatedData['meta_keywords'];
        $course->meta_title = $validatedData['name'];
        $course->meta_description = $validatedData['meta_description'];
        $course->status = $request->status == null ? '0' : '1';
        $course->top_course = $request->top_course == null ? '0' : '1';
        $course->free_course = $request->free_course == true ? '1' : '0';
        $course->created_by = Auth::user()->id;

        $course->update();

        return redirect('instructor/courses')->with('message', 'Course Updated Successfully');
    }

    public function destroy(Request $request) {
        $course = Course::find($request->course_id);
        
        if ($course) {
            $destination = 'uploads/course/'.$course->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
             
            $course->delete();

            return redirect('instructor/courses')->with('message', 'Course Deleted Successfully');
        } else {
            return redirect('instructor/courses')->with('message', 'No Course Found');
        }
    }
}
