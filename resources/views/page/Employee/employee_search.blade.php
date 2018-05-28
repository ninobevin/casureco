@extends('layouts.app')


@section('page-title')
	Employee Search
@endsection

@section('content-title')
	Employee Search
@endsection

@section('content')

<style type="text/css">

	.ui-autocomplete-loading { 
	background:url('{{ asset('dist/img/loading3.gif') }}') no-repeat right center ;

		/*background-color:red; */
	}
</style>
{{-- id	int(11) AI PK
archive_archive_type_id	int(11)
name	varchar(45)
description	varchar(45)
date	year(4)
department_id	int(11)
user_id	int(11)
created_at	datetime
updated_at	datetime --}}


<?php


	

?>



<div class="row">
	

<div class="col-md-12">

<form action="" method="get">
	<div class="input-group">
	  <input type="text" autocomplete="off"   name='search'  data-provide="typeahead" id='search' class="form-control" value="{{ @$_REQUEST['search'] }}" placeholder="Search...">
	  <span class="input-group-btn">
	    <button type="submit"   class="btn btn-flat"><i class="fa fa-search"></i>
	    </button>
	  </span>
	</div>


<br>

  <b class="text-muted"> Filter : </b> <br>
  <div class="form-group">

      <select name="status">
        <option value="all">All</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        <option value="terminated">Terminated</option>
      </select>


      <select name="group">
          <option value="all">All</option>
             @foreach( App\Model\coopca_hrd\Employee::select('cfgroup2')->groupBy('cfgroup2')->get() as $grp )
                  <option value="{{ $grp->cfgroup2 }}"> {{ $grp->cfgroup2 }} </option>
             @endforeach
      </select>

      <button type="submit"><i class="fa fa-search"></i> Search</button>
    
  </div>  



</form>
	
</div>
</div>


<div class="row">

{{-- 	<img src="{{ asset('dist/img/loading.gif') }}" alt=""> --}}

<?php

//dd(get_class_methods($employee));
?>

@if( count($employee) > 0)

<div class="col-sm-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-list"></i>

              <h3 class="box-title"> Result found : {{ (( $employee->currentPage()- 1) * 10) + $employee->count() }} / {{ $employee->total() }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="list-unstyled">
               	@foreach($employee as $emp)
               
               		<li style="height: 50%">

                    <div class="row">

                      <div class="col-sm-2">
                        <img width="50%" src='{{ URL("user/".$emp->cfcodeno."/avatar") }}' class="img" alt="User Image">
                      </div>    
                        
                        <div class="col-sm-4">
                         
                            <b>{{ $emp->cffname }} {{ $emp->cfmname }} {{ $emp->cflname }}</b>
                            <br>
                            <small class="text-muted">hired {{  Carbon\Carbon::parse($emp->dfhired)->diffForHumans() }}</small>
                            <br>
                              @switch( strtoupper($emp->cfstatus[0]))

                                @case("A")
                                  <span class="text-success"><b>Active</b></span>
                                @break

                                @case("I")
                                  <span class="text-default"><b>Inactive</b></span>
                                @break

                                @case("T")
                                  <span class="text-danger"><b>Terminated</b></span>
                                @break
                              @endswitch
                            <br>
                            <span class="badge bg-{{ $emp->getDepartment['color'] }}"> {{ $emp->cfgroup2 }}</span>                                                       
                        </div>
                        <div class="col-sm-6">

                             <a href="{{ route('employee.profile',['id'=>$emp->cfcodeno]) }}">
                                <i class="fa fa-user"></i>View Profile  
                              </a>  
                        </div>
                    </div>
                    <hr>
               		</li> 
               
               	@endforeach
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

@endif




</div>
	
	@if(isset($_REQUEST['search']))
	{{ $employee->appends(['search'=>$_REQUEST['search'],'status'=>$_REQUEST['status'],'group'=>$_REQUEST['group']])->links() }}

  @else

    {{ $employee->links() }}

	@endif
	

@endsection



@section('scripts')
<script type="text/javascript">

  $(document).ready(function(){

    $.ui.autocomplete.prototype._renderItem = function( ul, item){
      var term = this.term.split(' ').join('|');
      var re = new RegExp("(" + term + ")", "gi") ;
      var t = item.label.replace(re,"<b id='selectedItem'>$1</b>");
      return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append( "<a>" + t + "</a>" )
      .appendTo( ul );
    };




	 //    $( "#search" ).autocomplete({minLength: 5,
	 //      source:function(request, response) {
	 //        $.getJSON("{{ route('employee.employeeAutoComplete') }}", {term: request.term},
	 //          response);
	 //      },
	 //      select: function(str,ui){
	 // // 	 $("#test").html(ui.item.value)
		// // $("#searchForm").submit();

		// 		}


		// });
  });
</script>

@endsection