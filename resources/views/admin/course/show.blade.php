@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">{{$course->name}}</h4>
                <i><small>Created By:</small></i> <small>{{$course->user->name}}</small>
                <a href="{{url('admin/courses')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
            </div>

            <div class="card-body">
                    
                <div class="row">
                    <h4 class="mb-3 text-primary">Basic</h4>
                    
                    <div class="col-md-6 col-6 mb-3">
                        <label for=""><b>Name</b></label>
                        <p><small>{{$course->name}}</small></p>
                    </div>
                    <div class="col-md-6 col-6 mb-3">
                        <label for=""><b>Category</b></label>
                        <p><small>{{$course->category->name}}</small></p>
                    </div>
                    <div class="col-md-6 col-6 mb-3">
                        <label for=""><b>Level</b></label>
                        <p><small>{{$course->level}}</small></p>
                    </div>
                    <div class="col-md-6 col-6 mb-4">
                        <img src="{{asset('uploads/course/'.$course->image_path)}}" width="90px" alt="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Short Description</b></label>
                        <p><small>{{$course->short_description}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Description</b></label>
                        <p><small>{{$course->description}}</small></p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for=""><b>Course Overview Link</b></label>
                        <p><small>{{$course->yt_iframe}}</small></p>
                    </div>
                    <div class="col-md-4 col-6 my-3">
                        <label for=""><b>Status</b></label>
                        <p><small>{{$course->status == '1' ? 'Active' : 'Pending'}}</small></p>
                    </div>
                    <div class="col-md-4 col-6 my-3">
                        <label for=""><b>Top Course</b></label>
                        <p><small>{{$course->status == '1' ? 'Yes' : 'No'}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Requirements</b></label>
                        <p><small>{{$course->requirements}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Outcome</b></label>
                        <p><small>{{$course->outcome}}</small></p>
                    </div>

                    <h4 class="mt-4 mb-3 text-primary">Pricing</h4>
                    <div class="col-md-12 mb-3">
                        <label for=""><b>Free Course</b></label>
                        <p><small>{{$course->status == '1' ? 'Yes' : 'No'}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Original Price</b></label>
                        <p><small>{{$course->original_price}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Discount Price</b></label>
                        <p><small>{{$course->discount_price}}</small></p>
                    </div>

                    <h4 class="mt-4 mb-3 text-primary">SEO Tags</h4>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Meta Keywords</b></label>
                        <p><small>{{$course->meta_keywords}}</small></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Meta Description</b></label>
                        <p><small>{{$course->meta_description}}</small></p>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection