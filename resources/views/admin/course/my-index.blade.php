@extends('layouts.master')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/delete-course') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Course Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="course_id" id="course_id">
                <p>Are you sure to delete this course?</p>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger text-white">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">Courses</h4>
                <a href="{{url('admin/add-course')}}" class="btn btn-primary btn-sm text-white float-end">Add New</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <h4 class="text-primary">My Courses</h4>
                        <tr>
                            <th>Course</th>
                            <th>Short Description</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($my_courses as $course)
                            <tr>
                                <td>
                                    <img src="{{asset('uploads/course/'.$course->image_path)}}" width="190px" alt="">
                                    {{$course->name}}
                                </td>
                                <td>{{$course->description}}</td>
                                <td>{{$course->status == '1' ? 'Active' : 'Pending'}}</td>
                                <td>{{$course->user->name}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm text-white" href="{{url('admin/view-course/'.$course->id)}}">View</a>
                                    <a href="{{url('admin/edit-course/'.$course->id)}}" class="btn btn-success btn-sm text-white">Edit</a>
                                    <button type="button" value="{{$course->id}}" class="btn btn-danger btn-sm text-white deleteCourseBtn">Delete</a>
                                </td>
                                @if ($course->status == '1')
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                            <button class="btn btn-rounded btn-sm btn-outline-primary">Details</button>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                            <a class="dropdown-item" href="{{url('admin/add-course-details/'.$course->id)}}">
                                              <i class="mdi mdi-settings text-primary"></i>
                                              Add Course Details
                                            </a>
                                            <a class="dropdown-item" href="{{url('admin/add-course-details/'.$course->id)}}">
                                                <i class="mdi mdi-settings text-primary"></i>
                                                View Course Details
                                              </a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @empty
                            <tr><td colspan="5"><p>No Course Available</p></td></tr>
                        @endforelse
                    </tbody>
                </table>   
            </div>
        </div>
    </div>

    
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        /* $('.deleteCategoryBtn').click(function (e) {  */
            $(document).on('click', '.deleteCourseBtn', function (e) {

            e.preventDefault();
            
            var course_id = $(this).val();
            $('#course_id').val(course_id);
            $('#deleteModal').modal('show'); 
        });
    });
</script>

@endsection