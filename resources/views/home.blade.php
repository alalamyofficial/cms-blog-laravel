@extends('template_admin.home')

@section('content')
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    {{Auth::user()->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Posts</h4>
                  </div>
                  <div class="card-body">
                      {{$num_of_posts->count()}}
                </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fa fa-tag fa-2x" style="color:white"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tags</h4>
                  </div>
                  <div class="card-body">
                       {{$num_of_tags->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fa fa-list-alt fa-2x" style="color:white"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Categories</h4>
                  </div>
                  <div class="card-body">
                      {{$num_of_categories->count()}} 
                  </div>
                </div>
              </div>
            </div>
          </div>

          


@endsection