<section class="sidebar">
      <!-- Sidebar user panel -->
      <?php

      // $User =  App\Model\coopca_hrd\Employee::where('cfcodeno','=',Auth::user()->employee_no)->limit('1')->get()->first();




       
use \Illuminate\Support\Facades\Cookie;
       
      ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src='{{ URL("user/".@Auth::user()->employee_no."/avatar") }}' class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst(Auth::user()->name) }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>{{ COOKIE::get('emp_department') }}</a>
        </div>
      </div>
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Employee</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href='{{ route("employee.index") }}'>Find</a></li>
                <li class="treeview">
                  <a href="#">
                   <span>Reports</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href='{{ route("employee.reports") }}'>Certificates Issued</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-archive"></i> <span>Archive </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href='{{ route('archive.index') }}'>Files</a></li>
                <li><a href='{{ route('archive.linkFile') }}'>Manage Link</a></li>
              </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
    </section>