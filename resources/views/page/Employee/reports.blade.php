@extends('layouts.app')


@section('page-title')
	Certificate Issuance Report
@endsection

@section('content-title')
	
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
<div class="row no-print">
  <div class="col-sm-12" style="padding:25px;">
    <form action="" method="get">
      <div class="form-group col-md-3">
          <label class="label label-default">Type</label>
          <select name="type" id="type" class="form-control  input-sm">
            
            @if(@$_REQUEST['type'] == 'all' || !isset($_REQUEST['type']))
               <option selected value="all">All</option>
            @else
               <option value="all">All</option>
            @endif

            @foreach( App\LogType::all() as $grp)
              @if(@$_REQUEST['type'] == $grp->id)
                <option selected value="{{ $grp->id }}"> {{ $grp->name }} </option>
              @else
                <option value="{{ $grp->id }}"> {{ $grp->name }} </option>
              @endif
            @endforeach
          </select>
      </div>
      <div class="form-group col-md-3">
          <label class="label label-default">From</label>
          <input type="date" value="{{ @$_REQUEST['date_from'] }}" required="required" class="form-control input-sm" id="date_from" name="date_from">
      </div> 

      <div class="form-group col-md-6">
          <label class="label label-default">To</label>
          <div class="row">
            <div class="col-md-6">
              <input type="date"  value="{{ @$_REQUEST['date_to'] }}" required="required" class="form-control input-sm" id="date_to" name="date_to">
            </div>
            <div class="col-md-6">
               <button type="submit"><i class="fa fa-database"></i> Generate Report</button>
            </div>
          </div>
      </div> 
    </form>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
      <div class="invoice">
      <div class="row text-center" class=''>
        <h2>Certificate Issuance Report</h2>
          
        <address>
          @if(isset($_REQUEST['date_from']) && isset($_REQUEST['date_to']))
            {{ $_REQUEST['date_from']  }} - {{ $_REQUEST['date_to']  }}
          @endif
        </address>
      </div>
        <table class="table">
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Certificate</th>
         {{--  <th>IP</th>  --}}
          <th>Requested by</th>
          <th>Printed by</th>
          <th>Purpose</th>
        </tr>
              @foreach($logs as $log)
                <tr>
                  <td>{{ $loop->iteration +  $logs->currentPage() * $logs->perPage()  - $logs->perPage() }}</td>
                  <td>{{ $log->created_at }}</td>
                  <td>{{ $log->getType->name }}</td>
                  {{-- <td>{{ $log->ip }}</td> --}}
                  <td>{{ $log->getEmployee->cffname.' '.$log->getEmployee->cflname }}</td>
                  <td>{{ $log->getUser->cffname.' '.$log->getUser->cflname }}</td>
                  <td><p>{{ $log->purpose }}</p></td>
                </tr>
              @endforeach
        </table>
        @if(count($logs) >= 1)
            {{ @$logs->appends(['type'=>@$_REQUEST['type'],'date_from'=>@$_REQUEST['date_from'],'date_to'=>@$_REQUEST['date_to']])->links() }}
        @else
            
        @endif
        
      </div>
  </div>
</div>


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