@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Home Page</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
<div class="container-fluid">

    <!-- <div class="row row-cols-md-3">
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(73,9,121,1) 40%, rgba(149,0,255,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,67,1) 40%, rgba(0,138,255,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(121,9,113,1) 40%, rgba(255,0,22,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(73,9,121,1) 40%, rgba(149,0,255,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(73,9,121,1) 40%, rgba(149,0,255,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-header text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(73,9,121,1) 40%, rgba(149,0,255,1) 100%);">
                    <div class="row align-items-center">
                        <div class="col">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col">
                            <h3 class="display-3">08</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Total Tickets</h5>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Ticket</span>
                <span class="info-box-number">
                  {{ $new }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">WIP Ticket</span>
                <span class="info-box-number">{{ $wip }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-reply"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Answered Ticket</span>
                <span class="info-box-number">{{ $answered }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Closed Ticket</span>
                <span class="info-box-number">{{ $closed }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
</div>
</div>
@endsection
