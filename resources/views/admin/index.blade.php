@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
            <div class="me-md-3 me-xl-5">
            <h4 class="text-primary">Dashboard</h4>
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
            <ul class="nav nav-tabs px-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
            </li>
            </ul>
            <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                <a href="{{url('admin/categories')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-circle-outline icon-lg me-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Categories</small>
                        <h5 class="mb-0 d-inline-block">{{$categories}}</h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('admin/courses')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-view-headline icon-lg me-3 text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Courses</small>
                        <h5 class="mb-0 d-inline-block">{{$courses}}</h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('admin/instructors')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-account-box-outline icon-lg me-3 text-warning"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Instructors</small>
                        <h5 class="mb-0 d-inline-block">{{$instructors}}</h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('admin/students')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-account icon-lg me-3 text-black"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Students</small>
                        <h5 class="mb-0 d-inline-block">{{$students}}</h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('admin/messages')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-message-alert icon-lg me-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Messages</small>
                        <h5 class="mb-0 d-inline-block">{{$categories}}</h5>
                        </div>
                    </div>
                </a>
                <a href="{{url('admin/revenues')}}" class="text-decoration-none text-black">
                    <div class="d-block d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd icon-lg me-3 text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Revenues</small>
                        <h5 class="mb-0 d-inline-block">{{$categories}}</h5>
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

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Line chart</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bar chart</h4>
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>
</div>

@endsection
  

