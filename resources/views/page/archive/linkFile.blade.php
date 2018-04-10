@extends('layouts.app')


@section('page-title')
	Upload / Edit
@endsection

@section('content-title')
	
@endsection

@section('content')
{{-- id	int(11) AI PK
archive_archive_type_id	int(11)
name	varchar(45)
description	varchar(45)
date	year(4)
department_id	int(11)
user_id	int(11)
created_at	datetime
updated_at	datetime --}}
@if(Session::has('success_msg'))

  <div class="alert  alert-custom-success">

    <i class="fa fa-check"></i> {{ Session::get('success_msg') }}
  </div>

@endif
@if(Session::has('error_msg'))

  <div class="alert alert-custom-danger">

    <i class="fa fa-exclamation-triangle"></i> {{ Session::get('error_msg') }}
  </div>

@endif


<div class="col-md-6">

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-link"></i> Document Linker</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" enctype="multipart/form-data" method="post" action="{{ route('archive.linkPost') }}">
		

		<div class="box-body">
			<p class="text-muted">
				Document source is : ftp://172.16.0.22/cas1-shared/
			</p>
			<div class="form-group">
				<label for="name">Document Name</label>
				<input type="text" class="form-control" id="name"  name="name" required="required" placeholder="Enter document Name" style="text-transform: uppercase;" value="{{ @$_REQUEST['name'] }}">
			</div>
			<div class="form-group">
				<label for="description">Description / Tags / About your attachement</label>
				<textarea name="description" id="description" placeholder="Enter description" class="form-control" style="text-transform: uppercase;">{{ @$_REQUEST['description'] }}</textarea>
			</div>
			<div class="form-group">
				<label for="type">Group</label>
				<select name="type" id="type" class="form-control" required="required" required="required">
					<option value="" disabled selected >--Choose group--</option>
					@foreach(App\Model\ArchiveType::all() as $type)
					<option value='{{ $type->id }}'>{{ $type->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="document">URL Path</label>
				<input type="url" id="document" name="document" class="form-control" required="required" placeholder="Enter specific path" value="{{ @$_REQUEST['document'] }}">
				<p class="help-block">Ex. ftp://172.168.1.1/folder/file.file</p>
			</div>
		
		</div>
		{{ csrf_field() }}
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>



</div>

</div>


@endsection

@section('scripts')
<script type="text/javascript">

	$("#document").change(function () {
	    console.log(this);
	    console.log("sdfsdf");
	});

</script>
@endsection