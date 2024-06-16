@extends('layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Website Settings</h4>
            </div>

            <div class="card-body">
                <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" value="{{$setting == true ? $setting->website_name : " " }}" class="form-control" >
                            @error('website_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website Currency</label>
                            <select name="website_currency" class="form-control">
                                @if ($setting == true)
                                    <option {{$setting->currency == '&#8358;' ? 'selected' : ''}} value="&#8358;">NGN &#8358;</option>
                                    <option {{$setting->currency == '$' ? 'selected' : ''}} value="$">USD $</option>

                                @else
                                    <option value="">--Select--</option>
                                    <option value="&#8358;">NGN &#8358;</option>
                                    <option value="$">USD $</option>

                                @endif
                            </select>
                            @error('website_currency')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Website Logo</label>
                            <input type="file" name="website_logo"  class="form-control" >
                            @if ($setting)
                                <img src="{{asset('uploads/setting/'.$setting->logo)}}" width="70px" height="70px" alt="Logo">
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Website Favicon</label>
                            <input type="file" name="website_favicon" class="form-control" >
                            @if ($setting)
                                <img src="{{asset('uploads/setting/'.$setting->favicon)}}" width="70px" height="70px" alt="Favicon">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Website Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$setting == true ? $setting->description : " " }}</textarea>
                    </div>

                    <h4 class="mt-5 mb-3 text-primary">SEO Tags</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{$setting == true ? $setting->meta_description : " " }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{$setting == true ? $setting->meta_keywords : " " }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
  

