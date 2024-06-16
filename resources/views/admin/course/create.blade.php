@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Add Course</h4>
                <a href="{{url('admin/courses')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
            </div>

            <div class="card-body">
                <form action="{{url('admin/add-course')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <h4 class="mb-3">Basic</h4>
                        
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Name</label>
                            <input type="text" name="name" placeholder="Enter course name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select--</option>
                                @forelse ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>    
                                @empty
                                    <option disabled><h4>No Available Category</h4></option>
                                @endforelse
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                            @error('level')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="" class="required-field">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Short Description</label>
                            <textarea name="short_description" placeholder="Enter course short descripton" class="form-control" rows="3"></textarea>
                            @error('short_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Description</label>
                            <textarea name="description" placeholder="Enter course description" id="mySummernote" class="form-control" rows="3"></textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-4 my-5">
                            <label for="">Course Overview Link</label>
                            <input type="text" placeholder="https://www.example.com" name="yt_iframe" class="form-control">
                        </div>
                        <div class="col-md-4 my-5">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-4 my-5">
                            <label for="">Top Course</label>
                            <input type="checkbox" name="top_course">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Requirements</label>
                            <textarea name="requirements" placeholder="Enter course requirements" class="form-control" rows="3"></textarea>
                            @error('requirements')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Outcome</label>
                            <input type="text" name="outcome" placeholder="Enter course outcome" class="form-control">
                            @error('outcome')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <h4 class="mt-4 mb-3">Pricing</h4>
                        <div class="col-md-12 mb-3">
                            <label for="">Free Course</label>
                            <input type="checkbox" name="free_course">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="required-field">Original Price</label>
                            <input type="number" name="original_price" placeholder="Enter orginal price" class="form-control">
                            @error('original_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Discount Price</label>
                            <input type="number" name="discount_price" placeholder="Enter discount price" class="form-control">
                        </div>

                        <h4 class="mt-4 mb-3">SEO Tags</h4>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <input type="text" name="meta_keywords" placeholder="Enter meta keywords" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" placeholder="Enter meta description" class="form-control" rows="3"></textarea>
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