@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Edit Category</h4>
                <a href="{{url('admin/categories')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
            </div>

            <div class="card-body">
                <form action="{{url('admin/edit-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" value="{{$category->name}}" name="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="">Old Image</label>
                                <img src="{{asset('uploads/category/'.$category->image_path)}}" width="90px" alt="">
                            </div>
                            <label for="">New Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" {{$category->status == true ? 'checked' : ''}} name="status">
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