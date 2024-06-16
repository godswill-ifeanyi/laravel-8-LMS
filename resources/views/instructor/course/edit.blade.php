@extends('layouts.instructor')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Add Course</h4>
                <a href="{{url('instructor/courses')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
            </div>

            <div class="card-body">
                <form action="{{url('instructor/edit-course/'.$course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <h4 class="mb-3 text-primary">Basic</h4>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$course->name}}" placeholder="Enter course name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select--</option>
                                @forelse ($categories as $category)
                                    <option value="{{$category->id}}" {{$course->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>    
                                @empty
                                    <option disabled><h4>No Available Category</h4></option>
                                @endforelse
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Beginner" {{$course->level == 'Beginner' ? 'selected' : ''}}>Beginner</option>
                                <option value="Intermediate" {{$course->level == 'Intermediate' ? 'selected' : ''}}>Intermediate</option>
                                <option value="Advanced" {{$course->level == 'Advanced' ? 'selected' : ''}}>Advanced</option>
                            </select>
                            @error('level')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="my-3">
                                <label for="">Old Image</label>
                                <img src="{{asset('uploads/course/'.$course->image_path)}}" width="90px" alt="Course Image">
                            </div>
                            <label for="">New Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Short Description</label>
                            <textarea name="short_description" placeholder="Enter course short descripton" class="form-control" rows="3">{{$course->short_description}}</textarea>
                            @error('short_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" placeholder="Enter course description" id="mySummernote" class="form-control" rows="3">{{$course->description}}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 my-5">
                                <label for="">Course Overview Link</label>
                                <input type="text" placeholder="https://www.example.com" name="yt_iframe" value="{{$course->yt_iframe}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Requirements</label>
                            <textarea name="requirements" placeholder="Enter course requirements" class="form-control" rows="3">{{$course->requirements}}</textarea>
                            @error('requirements')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Outcome</label>
                            <input type="text" name="outcome" value="{{$course->outcome}}" placeholder="Enter course outcome" class="form-control">
                            @error('outcome')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <h4 class="mt-4 mb-3 text-primary">Pricing</h4>
                        <div class="col-md-12 mb-3">
                            <label for="">Free Course</label>
                            <input type="checkbox" {{$course->free_course == '1' ? 'checked' : ''}} name="free_course">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Original Price</label>
                            <input type="number" name="original_price" value="{{$course->original_price}}" placeholder="Enter orginal price" class="form-control">
                            @error('original_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Discount Price</label>
                            <input type="number" name="discount_price" value="{{$course->discount_price}}" placeholder="Enter discount price" class="form-control">
                        </div>

                        <h4 class="mt-4 mb-3 text-primary">SEO Tags</h4>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{$course->meta_keywords}}" placeholder="Enter meta keywords" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" placeholder="Enter meta description" class="form-control" rows="3">{{$course->meta_description}}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-sm text-white float-end">Update</button>
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection