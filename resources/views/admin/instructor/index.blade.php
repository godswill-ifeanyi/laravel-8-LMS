@extends('layouts.master')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/delete-instructor') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="instructor_id" id="instructor_id">
                <p>Are you sure to delete this instructor and all asociated courses?</p>
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
                <h4 class="text-primary">Instructors</h4>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <h4 class="text-primary">Locked</h4>
                        <tr>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($locked_instructors as $instructor)
                            <tr>
                                <td>
                                    {{$instructor->name}}
                                </td>
                                <td>{{$instructor->phone_no}}</td>
                                <td>{{$instructor->email}}</td>
                                <td>
                                    <a href="{{url('admin/activate-instructor/'.$instructor->id)}}" class="btn btn-success btn-sm text-white">Activate</a>
                                    <button value="{{$instructor->id}}" class="btn btn-danger btn-sm text-white deleteInstructorBtn">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5"><p>No Locked Instructor</p></td></tr>
                        @endforelse
                    </tbody>
                </table>

                
            </div>

            <div class="card-body table-responsive mt-5">
                <table class="table table-bordered table-striped">
                    <thead>
                        <h4 class="text-primary">Active</h4>
                        <tr>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($active_instructors as $instructor)
                            <tr>
                                <td>
                                    {{$instructor->name}}
                                </td>
                                <td>{{$instructor->phone_no}}</td>
                                <td>{{$instructor->email}}</td>
                                <td>
                                    <a href="{{url('admin/lock-instructor/'.$instructor->id)}}" class="btn btn-warning btn-sm text-white">Lock</a>
                                    <button value="{{$instructor->id}}" class="btn btn-danger btn-sm text-white deleteInstructorBtn">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5"><p>No Active Instructor</p></td></tr>
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
            $(document).on('click', '.deleteInstructorBtn', function (e) {

            e.preventDefault();
            
            var instructor_id = $(this).val();
            $('#instructor_id').val(instructor_id);
            $('#deleteModal').modal('show'); 
        });
    });
</script>
@endsection