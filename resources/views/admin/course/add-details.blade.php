@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Course Details</h4>
                <a href="{{url('admin/my-courses')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
            </div>

            <div class="card-body">
                <form action="{{url('admin/add-course-details/'.$course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <h4 class="mb-5 text-primary">{{$course->name}}</h4>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Virtual Class Link</label>
                            <input type="text" name="class_link" placeholder="Enter virtual class link" class="form-control">
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <label for="">Notes</label>
                            <textarea name="notes" placeholder="Enter notes" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">PDF File</label>
                            <input type="file" name="pdf_file" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Date and Time</label>
                            <input type="text" name="datetime" placeholder="Enter date and time" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-sm text-white float-end">Save</button>
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection