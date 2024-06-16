<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index() {
        $active_instructors = User::where('role_as','2')->where('status','1')->get();
        $locked_instructors = User::where('role_as','2')->where('status','0')->get();
        return view('admin.instructor.index', compact('active_instructors','locked_instructors'));
    } 

    public function lock($instructor_id) {
        $instructor = User::find($instructor_id);

        if ($instructor) {
            $instructor->status = '0';
            $instructor->update();

            return redirect('admin/instructors')->with('message', 'Instructor And All Associated Courses Locked Successfully');
        }
    }

    public function activate($instructor_id) {
        $instructor = User::find($instructor_id);

        if ($instructor) {
            $instructor->status = '1';
            $instructor->update();

            return redirect('admin/instructors')->with('message', 'Instructor And All Associated Courses Activated Successfully');
        }
    }

    public function destroy(Request $request) {
        $instructor = User::find($request->instructor_id);

        if ($instructor) {
            $instructor->delete();

            return redirect('admin/instructors')->with('message', 'Instructor And All Associated Courses Deleted Successfully');
        } else {
            return redirect('admin/instructors')->with('message', 'No Instructor Found');
        }
    }
}
