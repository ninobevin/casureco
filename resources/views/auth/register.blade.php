{{-- 


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




 --}}




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

        @include('sources.stylecollection1')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
 
</head>
<body class="hold-transition register-page">


  @if(Session::has('success_msg'))


<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Success!</h4>  {{ Session::get('success_msg') }}
</div>

  @endif
  @if(Session::has('error_msg'))

  

    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>  {{ Session::get('error_msg') }}
    </div>

  @endif


  <div class="register-box">
  <div class="login-logo">
    <a href=""><img src="{{ asset('img/casureco_ico_50x50.png') }}"/><b>CASURECO</b> WAN {{-- <small class="text-danger">System</small> --}}</a>
    
  </div>


    <div class="register-box-body">
      <p class="login-box-msg">Employee Security Login Register</p>


      <form action="{{ route('user.register.find') }}" method="get">
        <div class="form-group has-feedback">

            <input type="text" class="form-control" name="empcode" placeholder="Employee No">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {{ csrf_field() }}
 
            <button type="submit" class="btn btn-primary btn-block btn-flat">Find</button>

        </div>
       
      </form>




      @if(@$Employee)


      <form action="{{ route('user.register.create') }}" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="fullname" placeholder="Full name" value="{!!  $Employee->cffname.' '.$Employee->cfmname.' '.$Employee->cflname  !!}">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        
          <div class="form-group">
          <div class="row">
            <div class="col-xs-4">
              <small class="text-muted">Department: </small>
            </div>
            <!-- /.col -->
            <div class="col-xs-8">
                <small><b>{{ $Employee->cfgroup2.' '.$Employee->cfgroup3 }}</b></small>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <small class="text-muted">Position: </small>
            </div>
            <!-- /.col -->
            <div class="col-xs-8">
                <small><b>{{ $Employee->cfdesignat }}</b></small>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <small class="text-muted">Address: </small>
            </div>
            <!-- /.col -->
            <div class="col-xs-8">
                <small><b>{{ $Employee->cfaddress }}</b></small>
            </div>
          </div>
        </div>

        <input type="hidden" name="employee_no" id="employee_no" value="{{ $Employee->cfcodeno }}">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password" data-match="#password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
           {{--  <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div> --}}
          </div>
          <!-- /.col -->
        {{ csrf_field() }}
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      @endif

    {{--   <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
          Google+</a>
      </div>
 --}}
    {{--   <a href="login.html" class="text-center">I already have a membership</a> --}}
    </div>
    <!-- /.form-box -->
  </div>


@include('sources.scriptcollection1')

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>







