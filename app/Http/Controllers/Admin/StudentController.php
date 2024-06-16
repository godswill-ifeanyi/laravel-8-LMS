<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $active_students = User::where('role_as','3')->where('status','1')->get();
        $locked_students = User::where('role_as','3')->where('status','0')->get();
        return view('admin.student.index', compact('active_students','locked_students'));
    } 

    public function lock($student_id) {
        $student = User::find($student_id);

        if ($student) {
            $student->status = '0';
            $student->update();

            return redirect('admin/students')->with('message', 'Student Locked Successfully');
        }
    }

    public function activate($student_id) {
        $student = User::find($student_id);

        if ($student) {
            $student->status = '1';
            $student->update();

            return redirect('admin/students')->with('message', 'Student Activated Successfully');
        }
    }

    public function destroy(Request $request) {
        $student = User::find($request->student_id);

        if ($student) {
            $student->delete();

            return redirect('admin/students')->with('message', 'Student Deleted Successfully');
        } else {
            return redirect('admin/students')->with('message', 'No Student Found');
        }
    }
}
