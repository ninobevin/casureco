
@extends('layouts.app')


@section('page-title')
  Employee Profile
@endsection

@section('content-title')
  Employee Profile
@endsection

@section('content')


<?php
  

  $canvas_source = URL("user/".$Employee->cfcodeno."/avatar");
  
?>



<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img id="prof_pic"  class="profile-user-img img-responsive" src='{{ URL("user/".$Employee->cfcodeno."/avatar") }}' alt="User profile picture">
              </img>

           
                <div style="text-align: center;">
                 {{--  <a id="btn_upload"><i class="fa fa-upload"></i></a>  --}}

                {{--  <a id="btn_upload"><i class="fa fa-upload"></i></a>
 --}}

                 <label class="btn-file">
                     <a ><i class="fa fa-upload"></i></a> <input type="file" id="btn_upload" style="display: none;">
                 </label>

                  <a id="btn_edit" data-toggle="modal" data-target="#imageCrop"><i class="fa fa-crop"></i></a>  
                </div>

                <div id="wait-text2" style="visibility: hidden; text-align: center;">
                       <img  src="{{ asset('dist/img/loading3.gif') }}"></img>  <span>Updating profile..Please wait...</span>
                </div>
                 
           


              <h3 class="profile-username text-center">{{ $Employee->cffname }} {{ $Employee->cfmname }} {{ $Employee->cflname }}</h3>

              <p class="text-muted text-center">{{ $Employee->cfdesignat }}</p>

           {{--    <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul> --}}

             {{--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Other Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#basicInfo" data-toggle="tab">Basic Info</a></li>
            
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
              <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   Certificates <span class="caret"></span>
                 </a>
                 <ul class="dropdown-menu">
                   <li role="presentation">
                      <a role="menuitem" tabindex="-1" href='{{ route("employee.coe_wc_form",["id"=>$Employee->cfcodeno]) }}'>Certificate of Employment w/ Compensation</a>
                   </li>
                   <li role="presentation">
                      <a role="menuitem" tabindex="-1" href='{{ route("employee.coe_form",["id"=>$Employee->cfcodeno]) }}'>Certificate of Employment</a>
                   </li>
                 </ul>
               </li>
            </ul>
            <div class="tab-content">
           
              <div class="active tab-pane" id="basicInfo">
                  
                <div class="row">
                      
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="text-muted">Firstname</div>
                    <p>{{ $Employee->cffname }}</p>

                  </div>
                  <div class="col-md-3">
                    <span class="text-muted">Middlename</span>
                    <p>{{ $Employee->cfmname }}<p>

                  </div>
                  <div class="col-md-3">
                    <span class="text-muted">Lastname</span>
                    <p>{{ $Employee->cflname }}</p>

                  </div>

                  <div class="col-md-4">
                    <span class="text-muted">Address</span>
                    <p>{{ $Employee->cfaddress }}</p>

                  </div>

                  <div class="col-md-4">
                    <span class="text-muted">Place of Birth</span>
                    <p>{{ $Employee->cfbirth }}</p>

                  </div>

                  <div class="col-md-3">
                    <span class="text-muted">Date of Birth</span>
                    <p>{{ $Employee->dfbirth }}</p>

                  </div>                 
                  </div>

                </div>
                 <hr>
                 
                 <div class="row">
                   <div class="col-md-12">
                      <div class="col-md-12">
                         <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                      </div>
                     
                      @foreach($Employee->getSchool()->get() as $school)
                          <div class="col-md-12">
                            <span class="text-muted">{{ $school['cfcourse'] }}</span>
                            <p>{{ $school['cfschool'] }}</p>
                          </div>
                      @endforeach                     
                   </div>
                 </div>                  
                  



              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
</div>
@include('modal.imageCrop')
@endsection

@section('scripts')



<script>

  
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#prof_pic').attr('src', e.target.result);

      //img_src = e.target.result;
      //$('#img_test').attr('src', e.target.result);

      //console.log($('#img_test').src);

        var srcpic = document.getElementById("prof_pic").src;

       imageCropper.image.src =  srcpic

       document.getElementById("imgpic").value = srcpic.split(",")[1];

       $("#wait-text2").css("visibility","visible");

       $("#form_pic").submit();


       $("#form_pic").submit();
       
   
   
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#btn_upload").change(function() {

  
  readURL(this);



  imageCropper.init();

  
   




});




</script>

  

@endsection

{{-- <div class="active tab-pane" id="activity">
  <!-- Post -->
  <div class="post">
    <div class="user-block">
      <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
          <span class="username">
            <a href="#">Jonathan Burke Jr.</a>
            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
          </span>
      <span class="description">Shared publicly - 7:30 PM today</span>
    </div>
    <!-- /.user-block -->
    <p>
      Lorem ipsum represents a long-held tradition for designers,
      typographers and the like. Some people hate it and argue for
      its demise, but others ignore the hate as they create awesome
      tools to help create filler text for everyone from bacon lovers
      to Charlie Sheen fans.
    </p>
    <ul class="list-inline">
      <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
      <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
      </li>
      <li class="pull-right">
        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
          (5)</a></li>
    </ul>

    <input class="form-control input-sm" type="text" placeholder="Type a comment">
  </div>
  <!-- /.post -->

  <!-- Post -->
  <div class="post clearfix">
    <div class="user-block">
      <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
          <span class="username">
            <a href="#">Sarah Ross</a>
            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
          </span>
      <span class="description">Sent you a message - 3 days ago</span>
    </div>
    <!-- /.user-block -->
    <p>
      Lorem ipsum represents a long-held tradition for designers,
      typographers and the like. Some people hate it and argue for
      its demise, but others ignore the hate as they create awesome
      tools to help create filler text for everyone from bacon lovers
      to Charlie Sheen fans.
    </p>

    <form class="form-horizontal">
      <div class="form-group margin-bottom-none">
        <div class="col-sm-9">
          <input class="form-control input-sm" placeholder="Response">
        </div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.post -->

  <!-- Post -->
  <div class="post">
    <div class="user-block">
      <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
          <span class="username">
            <a href="#">Adam Jones</a>
            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
          </span>
      <span class="description">Posted 5 photos - 5 days ago</span>
    </div>
    <!-- /.user-block -->
    <div class="row margin-bottom">
      <div class="col-sm-6">
        <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-6">
            <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
            <br>
            <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
            <br>
            <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <ul class="list-inline">
      <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
      <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
      </li>
      <li class="pull-right">
        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
          (5)</a></li>
    </ul>

    <input class="form-control input-sm" type="text" placeholder="Type a comment">
  </div>
  <!-- /.post -->
</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="timeline">
  <!-- The timeline -->
  <ul class="timeline timeline-inverse">
    <!-- timeline time label -->
    <li class="time-label">
          <span class="bg-red">
            10 Feb. 2014
          </span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <li>
      <i class="fa fa-envelope bg-blue"></i>

      <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

        <div class="timeline-body">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
          weebly ning heekya handango imeem plugg dopplr jibjab, movity
          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
          quora plaxo ideeli hulu weebly balihoo...
        </div>
        <div class="timeline-footer">
          <a class="btn btn-primary btn-xs">Read more</a>
          <a class="btn btn-danger btn-xs">Delete</a>
        </div>
      </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline item -->
    <li>
      <i class="fa fa-user bg-aqua"></i>

      <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
        </h3>
      </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline item -->
    <li>
      <i class="fa fa-comments bg-yellow"></i>

      <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

        <div class="timeline-body">
          Take me to your leader!
          Switzerland is small and neutral!
          We are more like Germany, ambitious and misunderstood!
        </div>
        <div class="timeline-footer">
          <a class="btn btn-warning btn-flat btn-xs">View comment</a>
        </div>
      </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline time label -->
    <li class="time-label">
          <span class="bg-green">
            3 Jan. 2014
          </span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <li>
      <i class="fa fa-camera bg-purple"></i>

      <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

        <div class="timeline-body">
          <img src="http://placehold.it/150x100" alt="..." class="margin">
          <img src="http://placehold.it/150x100" alt="..." class="margin">
          <img src="http://placehold.it/150x100" alt="..." class="margin">
          <img src="http://placehold.it/150x100" alt="..." class="margin">
        </div>
      </div>
    </li>
    <!-- END timeline item -->
    <li>
      <i class="fa fa-clock-o bg-gray"></i>
    </li>
  </ul>
</div>
<!-- /.tab-pane -->

<div class="tab-pane" id="settings">
  <form class="form-horizontal">
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Name</label>

      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputName" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Name</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

      <div class="col-sm-10">
        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>
</div> --}}