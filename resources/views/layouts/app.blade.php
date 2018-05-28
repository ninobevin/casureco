



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page-title')</title>
  <!-- Tell the browser to be responsive to screen width -->



  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   {{--  <link rel='shortcut icon' href='http://example.com/favicon.ico' type='image/x-icon'>
    <link rel='icon' href='http://example.com/favicon.ico' type='image/x-icon'> --}}
    <link rel="shortcut icon" href="{{ asset('img/casureco_ico_50x50.png') }}" />
  

    @include('sources.stylecollection1')

    

  <!-- Morris chart -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js")}}></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js")}}></script>
  <![endif]-->

  <!-- Google Font -->

</head>

  @if(!Auth::user())

  <?php

     $User =  App\User::where('employee_no','=',Cookie::get('emp_code'))->first();

  ?>

 


{{--   <body style="text-align: center;" class="class="hold-transition skin-red sidebar-mini"">
    
          <div style="margin-top: 100px;">
            
          </div>
       
          <img src='{{ URL("user/". Cookie::get('emp_code') ."/avatar") }}' width="100px;" class="img-circle" alt="User Image">
      
        <h3>{{ Cookie::get('emp_code') }}</h3>
     
      <form  method="post" action="{{ route('login') }}">
             <h1><i class="fa fa-lock"></i> User session expired :(</h1>
             <p class="lbl lbl-danger">Sorry, for security purposes we need to verify logins due to page inactivity.</p>
            {{ csrf_field() }}
             <input type="hidden" id="email" name="email" value="{{ App\User::where('employee_no','=',Cookie::get('emp_code'))->first()->email }}">
            <input type="password" class="input" name="password">
           <button type="submit" class="btn btn-success"><i class="fa fa-key"></i> Unlock</button>  
      </form> 


   </body> --}}


   <body class="hold-transition lockscreen">
   <!-- Automatic element centering -->
   <div class="lockscreen-wrapper">
     <div class="lockscreen-logo">
       <a href=""><img src="{{ asset('img/casureco_ico_50x50.png') }}"/><b>CASURECOa</b> WAN {{-- <small class="text-danger">System</small> --}}</a>
     </div>
     <!-- User name -->
     <div class="lockscreen-name">{{ $User->cffname }} {{ $User->cflname }}</div>

     <!-- START LOCK SCREEN ITEM -->
     <div class="lockscreen-item">
       <!-- lockscreen image -->
       <div class="lockscreen-image">
         <img src='{{ URL("user/". Cookie::get('emp_code') ."/avatar") }}' alt="User Image">
       </div>
       <!-- /.lockscreen-image -->

       <!-- lockscreen credentials (contains the form) -->
       <form class="lockscreen-credentials" method="post" action="{{ route('login') }}">
         <div class="input-group">
           <input type="password" name="password" id="password" class="form-control" placeholder="password">
           <input type="hidden" id="email" name="email"  value="{{ $User->email }}">
           {{ csrf_field() }}

           <div class="input-group-btn">
             <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
           </div>
         </div>
       </form>
       <!-- /.lockscreen credentials -->

     </div>
     <!-- /.lockscreen-item -->
     <div class="help-block text-center">
       Sorry, for security purposes we need to verify logins due to page <span class="text-danger">inactivity</span>.
     </div>
     <div class="text-center">
       <a href="{{ route('home') }}">Or sign in as a different user</a>
     </div>
     <div class="lockscreen-footer text-center">
        
     </div>
   </div>
   
     
   </body>



  @else
  
      <body class="hold-transition skin-red sidebar-mini">
      <div class="wrapper"  >

        @include('panel.header')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          @include('menu.main-sidebar')
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
                @yield('content-title')
            </h1>
          {{--   <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
          </section>

          <!-- Main content -->
          <section class="content" style="">
            <!-- Small boxes (Stat box) -->
           
            <!-- /.row (main row) -->
            @yield('content')

          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
              <h3 class="control-sidebar-heading">Recent Activity</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                      <p>Will be 23 on April 24th</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-user bg-yellow"></i>

                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                      <p>New phone +1(800)555-1234</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                      <p>nora@example.com</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                      <p>Execution time 5 seconds</p>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- /.control-sidebar-menu -->

              <h3 class="control-sidebar-heading">Tasks Progress</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                      Custom Template Design
                      <span class="label label-danger pull-right">70%</span>
                    </h4>

                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                      Update Resume
                      <span class="label label-success pull-right">95%</span>
                    </h4>

                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                      Laravel Integration
                      <span class="label label-warning pull-right">50%</span>
                    </h4>

                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                      Back End Framework
                      <span class="label label-primary pull-right">68%</span>
                    </h4>

                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
              <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Report panel usage
                    <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                    Some information about this general settings option
                  </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Allow mail redirect
                    <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                    Other sets of options are available
                  </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Expose author name in posts
                    <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                    Allow the user to show his name in blog posts
                  </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Show me as online
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Turn off notifications
                    <input type="checkbox" class="pull-right">
                  </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Delete chat history
                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                  </label>
                </div>
                <!-- /.form-group -->
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->

      </div>
      <!-- ./wrapper -->
        @include('panel.footer')
      <!-- jQuery 3 -->
      <script src={{asset("bootstrap/js/jquery.js")}}></script>
      <!-- jQuery UI 1.11.4 -->
      <script src={{asset("bootstrap/js/jquery-ui.js")}}></script>

      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src={{asset("bootstrap/js/bootstrap.min.js")}}></script>

      <!-- Morris.js charts -->
      <!-- Slimscroll -->
      <script src={{asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}></script>

      <script src={{asset("bootstrap/js/typeahead.js")}}></script>
      <!-- AdminLTE App -->

      <script src={{asset("dist/js/adminlte.js")}}></script>

      @yield('scripts')

      </body>
  @endif
</html>
