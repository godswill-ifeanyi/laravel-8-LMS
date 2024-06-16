@extends('layouts.master')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/delete-category') }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id">
                <p>Are you sure to delete this category and all associated courses?</p>
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
                <h4 class="text-primary">Categories</h4>
                <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm text-white float-end">Add New</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    <img src="{{asset('uploads/category/'.$category->image_path)}}" width="190px" alt="">
                                    {{$category->name}}
                                </td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->status == '1' ? 'Visible' : 'Hidden'}}</td>
                                <td>
                                    <a href="{{url('admin/edit-category/'.$category->id)}}" class="btn btn-success btn-sm text-white">Edit</a>
                                    <button type="button" value="{{$category->id}}" class="btn btn-danger btn-sm text-white deleteCategoryBtn">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5"><p>No Available Category</p></td></tr>
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
            $(document).on('click', '.deleteCategoryBtn', function (e) {

            e.preventDefault();
            
            var category_id = $(this).val();
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show'); 
        });
    });
</script>
@endsection