
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Ticketing Module</title>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

<style>
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active{
    /* background-image: linear-gradient( 135.9deg,  rgba(109,25,252,1) 16.4%, rgba(125,31,165,1) 56.1% ) !important; */
    background-image: linear-gradient( 89.7deg,  rgba(0,32,95,1) 2.8%, rgba(132,53,142,1) 97.8% ) !important;
  }
  [class*='sidebar-dark-'] .nav-treeview > .nav-item > .nav-link.active{
    color: #fff !important;
    background-image: linear-gradient( 89.7deg,  rgba(0,32,95,1) 2.8%, rgba(132,53,142,1) 97.8% ) !important;
    
  }
  .nav-sidebar>li.has-treeview>a{
    color: #fff !important;
    background-image: linear-gradient( 109.6deg,  rgba(5,84,94,1) 16%, #bbb 91.1% );
  }
  .nav-sidebar>li.menu-open>a{
    color: #fff !important;
    background-image: linear-gradient( 109.6deg,  rgba(5,84,94,1) 16%, #bbb 91.1% );
  }
  
</style>
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed layout-fixed">
<div id="app">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="Logout">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-widget="control-sidebar" data-slide="true" role="button">
            <span><i class="fas fa-sign-out-alt fa-lg"></i></span> Sign Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </span>
      </li>
    </ul>

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="/img/logo-dbl.jpg" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DBL Ceramics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @php if(isset(Auth::user()->name)){
          @endphp
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @php
          }
          @endphp
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav tabs nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link {{ 'home' == request()->path() ? 'active' : '' }}">
              <i style="color: #ECBF08;" class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home Page
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i style="color: #4BE7EF;" class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i style="color: #1A4772;" class="right fa fa-angle-left"></i>
              </p>
            </a>
            @php 
              $currentURL= "";
              $currentPath = \Request::path();
              if(isset($_SERVER['QUERY_STRING'])){
                $queryString = $_SERVER['QUERY_STRING'];
                $currentURL = $currentPath.'?'.$queryString;
              }
            @endphp
            <ul class="nav nav-treeview sub-nav">
              <li class="nav-item">
                <a href="{{ route('ticket', ['type' => 'new']) }}" class="nav-link {{ 'ticket?type=new' == $currentURL ? 'active' : '' }}">
                  <i  style="color: #007bff;" class="fa fa-calendar-plus nav-icon"></i>
                  <p>
                    New Ticket
                    <span class="right badge badge-primary">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ticket', ['type' => 'wip']) }}" class="nav-link {{ 'ticket?type=wip' == $currentURL ? 'active' : '' }}">
                  <i style="color: #ffc107;" class="fa fa-spinner nav-icon"></i>
                  <p>
                    WIP Ticket
                    <span class="right badge badge-warning">WIP</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ticket', ['type' => 'answered']) }}" class="nav-link {{ 'ticket?type=answered' == $currentURL ? 'active' : '' }}">
                  <i style="color: #28a745;" class="fa fa-reply nav-icon"></i>
                  <p>
                    Answered Ticket
                    <span class="right badge badge-success">Ans</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ticket', ['type' => 'closed']) }}" class="nav-link {{ 'ticket?type=closed' == $currentURL ? 'active' : '' }}">
                  <i style="color: #dc3545;" class="fa fa-times nav-icon"></i>
                  <p>
                    Closed Ticket
                    <span class="right badge badge-danger">Closed</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          @php 
              if(Auth::user()->isAdmin){
          @endphp
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i  style="color: #4BE7EF;" class="nav-icon fa fa-paperclip"></i>
              <p>
                Static Content
                <i style="color: #1A4772;" class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-nav">
              <li class="nav-item">
                <a href="/department" class="nav-link {{ 'department' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #15BAA6;" class="fa fa-building nav-icon"></i>
                  <p>
                    Departments
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/division" class="nav-link {{ 'division' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #15BA65;" class="fa fa-globe-asia nav-icon"></i>
                  <p>
                    Divisions
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/district" class="nav-link {{ 'district' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #BA6A15;" class="fa fa-map-marked-alt nav-icon"></i>
                  <p>
                    Districts
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/query-type" class="nav-link {{ 'query-type' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #5F6BF2;" class="fa fa-question-circle nav-icon"></i>
                  <p>
                    Query Type
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/complain-type" class="nav-link {{ 'complain-type' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #ff0000;" class="fa fa-exclamation-triangle nav-icon"></i>
                  <p>
                    Complain Type
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/call-remarks" class="nav-link {{ 'call-remarks' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #59b300;" class="fa fa-comment-dots nav-icon"></i>
                  <p>
                    Call Remarks
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i  style="color: #4BE7EF;" class="nav-icon fa fa-paperclip"></i>
              <p>
                Ticketing Matrix
                <i style="color: #1A4772;" class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-nav">
              <li class="nav-item">
                <a href="/escalation" class="nav-link {{ 'escalation' == \Request::segment(1) ? 'active' : '' }}">
                  <i style="color: #D41397;" class="fas fa-sitemap nav-icon"></i>
                  <p>
                    Mapping
                  </p>
                </a>
              </li>
            </ul>
          </li>
          @php 
              }
          @endphp
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <main class="content">
            @yield('content')
        </main>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <strong>Copyright &copy <a href="https://myolbd.com">MY Outsourcing Ltd.</a>.</strong> All rights reserved.
  </footer>
</div>
</div>

<!-- ./wrapper -->
    @include('sweetalert::alert')
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    
    @yield('scripts')

    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

      $(document).ready(function(){
        $('.nav-link').click(function(e){
          console.log(e);
        })
      });

      var pathname = window.location.pathname;
      console.log(pathname);
    </script>
</body>
</html>
