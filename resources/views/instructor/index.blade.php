@extends('layouts.instructor')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
            <div class="me-md-3 me-xl-5">
            <h4>Dashboard</h4>
            </div>
            <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body dashboard-tabs p-0">
            
            <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                
                <a href="{{url('instructor/courses')}}" class="text-decoration-none text-black">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-view-headline icon-lg me-3 text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Courses</small>
                        <h5 class="mb-0 d-inline-block"></h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('instructor/students')}}" class="text-decoration-none text-black">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-account icon-lg me-3 text-black"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Students</small>
                        <h5 class="mb-0 d-inline-block"></h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('instructor/messages')}}" class="text-decoration-none text-black">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-message-alert icon-lg me-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Messages</small>
                        <h5 class="mb-0 d-inline-block"></h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('instructor/revenues')}}" class="text-decoration-none text-black">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd icon-lg me-3 text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Revenues</small>
                        <h5 class="mb-0 d-inline-block"></h5>
                        </div>
                    </div>
                </a>
                </div>
            </div>
            
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
  

