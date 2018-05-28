@extends('layouts.app')
@section('page-title')
Employee Profile
@endsection
@section('content-title')

@endsection
<?php

use \Carbon\Carbon;
$jobfirst = $Employee->getJobHistory->first();
$jobLast = $Employee->getJobHistory->last();
?>
@section('content')
<style>
input[type='checkbox']{
cursor:pointer;
}
</style>
{{--   <div class="row no-print">
  <div class="col-md-12 ">
    <div class="panel col-md-6">
      Choose any item to be included below.
      <div class="form-group">
        @foreach(App\Model\coopca_hrd\Allowance::all() as $allowance)
        <input type="checkbox" class="flat-red" onclick='insertValue(this,"{{$allowance->description}}","{{$allowance->monthly}}","{{$allowance->yearly}}")'>
        {{$allowance->description}}
        <br>
        @endforeach
      </div>
    </div>
  </div>
</div> --}}
<div class="row no-print">
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Certification Details</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      
          <div class="col-sm-12">
          <form class="form">
              <div class="form-group">
                <label for="inputName" class="control-label">Purpose:</label>

                
                  <textarea style="resize: none;" class="form-control" id="purpose" placeholder=""></textarea>
               
              </div>
              
             
          </form>
          </div>
        <!-- /.table-responsive -->

        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Monthly</th>
                  <th>Yearly</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach(App\Model\coopca_hrd\Allowance::all() as $allowance)
                <tr>
                  <td>{{$allowance->description}}</td>
                  <td>{{$allowance->monthly}}</td>
                  <td>{{$allowance->yearly}}</td>
                  <td>
                    <input type="checkbox" class="minimal-red" onclick='insertValue(this,"{{$allowance->description}}","{{$allowance->monthly}}","{{$allowance->yearly}}","cb_{{$allowance->id}}")'>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> --}}
        <a href="javascript:void(0)" id="update_info"  class="btn btn-sm btn-default btn-flat pull-right">Update Info</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
<div class="invoice" style="padding-left: 50px;padding-right: 50px;">
  
  <style>
  table{
  width:100%;
  }
  
  </style>
  <div class="col-xs-12" style="height:120px;"></div>
  <div class="row">
    <div style="text-align: center;">
      
      <h3><b>CERTIFICATE OF EMPLOYMENT</b></h3>
      <img src='{{ URL("user/".$Employee->cfcodeno."/avatar") }}' class="img" alt="User Image" style="width: 150px;">
    </div>
  </div>
  <br>
  <p>
    To whom it may concern:
  </p>
  <br>
  
  <p style="text-indent: 3em;"  contenteditable="true" align="justify">This is to certify that based on record,<b>
    <?php
    
    if( strtoupper($Employee->cfsex[0]) == "M")
    {
    echo "Mr.";
    }elseif (strtoupper($Employee->cfsex[0]) == "F") {
    # code...
    echo "Ms.";
    }else{
    # code...
    echo "";
    }
    ?> {{ $Employee->cffname }} {{ $Employee->cfmname }} {{ $Employee->cflname }}</b>, whose picture appears herein, is an employee of the Camarines Sur 1 Electric Cooperative, Inc. (CASURECO 1) from <b>{{ Carbon::parse($Employee->dfhired)->format('F d, Y') }}</b> and has held the position of <b>{{ strtoupper(strtolower($jobLast['cftitle'])) }}</b> from
    <b>{{ Carbon::parse($jobLast['dfdate1'])->format('F d, Y') }}</b> up to <b>
  {{ $Employee->cfstatus[0] !=  "A" || $Employee->dfout != "0000-00-00"  ?  Carbon::parse($Employee->dfout)->format('F d, Y') : "present"}} </b>  with the following compensation, to wit:</p>
  
  <!-- /.row  header -->
  {{--   <div class="row">
    <table class="table">
      <caption>table title and/or explanatory text</caption>
      <thead>
        <tr>
          <th></th>
          
          <th>Monthly</th>
          
          <th>Annually</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
  </div> --}}
  <div class="row" style="padding-left: 56px;padding-right: 56px;">
    <div id="table" class="table-editable">
      <a class="table-add no-print" style="cursor:pointer;"><i class="fa fa-plus"></i> Add Row</a>
      <table class="">
        <tr>
          <th></th>
          <th style="text-align:center;">Monthly</th>
          <th style="text-align:center;">Annually</th>
          <th colspan='2'>
          </tr>
          <tr>
            <input type="hidden" id="basic_salary" value="{{ $Employee->nfratemo }}">
            <td>Basic Salary</td>
            <td style="text-align:right;" id="total_month">{{ number_format($Employee->nfratemo,2,'.',',') }}</td>
            <td style="text-align:right;" id="total_year">{{ number_format(($Employee->nfratemo * 12),2,'.',',') }}</td>
            <td style="text-align:right;">
              <span class="table-remove glyphicon glyphicon-remove no-print"></span>
            </td>
            <td class="no-print text-right">
              <span class="table-up glyphicon glyphicon-arrow-up"></span>
              <span class="table-down glyphicon glyphicon-arrow-down"></span>
            </td>
          </tr>
          <tr>
            <td>13<sup>th</sup> Month Pay</td>
            <td style="text-align:right;" id="total_month"></td>
            <td style="text-align:right;" id="total_year">{{ number_format($Employee->nfratemo,2,'.',',') }}</td>
            <td style="text-align:right;">
              <span class="table-remove glyphicon glyphicon-remove no-print"></span>
            </td>
            <td class="no-print text-right">
              <span class="table-up glyphicon glyphicon-arrow-up"></span>
              <span class="table-down glyphicon glyphicon-arrow-down"></span>
            </td>
          </tr>
          <tr>
            <td>14<sup>th</sup> Month Pay</td>
            
            <td style="text-align:right;" id="total_month"></td>
            
            <td style="text-align:right;" id="total_year">{{ number_format($Employee->nfratemo,2,'.',',') }}</td>
            <td style="text-align:right;">
              <span class="table-remove glyphicon glyphicon-remove no-print"></span>
            </td>
            <td class="no-print text-right">
              <span class="table-up glyphicon glyphicon-arrow-up"></span>
              <span class="table-down glyphicon glyphicon-arrow-down"></span>
            </td>
          </tr>
          <tr class="hide">
            <td contenteditable="true" id="description">Item here</td>
            <td contenteditable="true" style="text-align:right;" id="total_month">0.00</td>
            <td contenteditable="true" style="text-align:right;" id="total_year">0.00</td>
            <td style="text-align:right;">
              <span class="table-remove glyphicon glyphicon-remove no-print"></span>
            </td>
            <td class="no-print text-right">
              <span class="table-up glyphicon glyphicon-arrow-up"></span>
              <span class="table-down glyphicon glyphicon-arrow-down"></span>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <br>
    
    <p contenteditable="true" style="text-indent: 3em;" align="justify">This is being issued for <strong id="purpose_area">Purpose here....</strong> this {{ Carbon::now()->format(' jS \d\a\y \of F Y') }} at CASURECO I Main Office, Puro-Batia, Libmanan, Camarines Sur, Philippines.
    </p>
    
    <div class="col-xs-12" style="height:40px;"></div>
    <p style="margin-left:45px;" class="text-muted pull-left">Not valid without <br> CASURECO 1 dry seal</p>
    <div class="row">
      
      <div class="pull-right" style=" width:150px; text-align:center; margin-right:60px;">
        <B contenteditable="true">ANA SYLVIA M. ALSISTO</B>
        <div contenteditable="true">
          General Manager
        </div>
      </div>
    </div>
    
    <hr class="no-print">
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="no-print">
      <input type="hidden" value="0" id="hid_total_month">
      <input type="hidden" value="0" id="hid_total_year">
    </div>
    <div class="row no-print">
      <div class="col-xs-12">
        <form id="frm_print">
          
          <input type="hidden" name="id" value="{{ $Employee->cfcodeno }}">
          <input type="hidden" name="frm_print" value="1">
          
          <button type="button" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i>Print</button>
          <button id="export-btn" type="button" class="btn btn-success pull-right">
          <i class="fa fa-credit-card"></i> Display Total
          </button>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
  @endsection
  @section('scripts')
  <script>
  //Flat red color scheme for iCheck
  
  $("#update_info").click(function(){

    $("#purpose_area").text($("#purpose").val());

  });


  window.onafterprint = function(){
  
    
    var str_purpose = $("#purpose").val();

    console.log(str_purpose);

      $.get( "<?php  echo route('employee.addtoprintlog');  ?>",{"id":"<?php  echo $Employee->cfcodeno;  ?>","str_purpose":str_purpose},function(data) {
        console.log(data);
      });
    //  alert("hey");
    console.log("Printing after");
  }
  function number_format (number, decimals, dec_point, thousands_sep) {
  // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
      toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }
  var $TABLE = $('#table');
  var $BTN = $('#export-btn');
  var $EXPORT = $('#export');
  $('.table-add').click(function () {
    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $TABLE.find('table').append($clone);
  });
  $('.table-remove').click(function () {
     $(this).parents('tr').detach();
  });
  $('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
  });
  $('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
  });
  // A few jQuery helpers for exporting only
  jQuery.fn.pop = [].pop;
  jQuery.fn.shift = [].shift;
  $BTN.click(function () {
  if(!$("#total_income_row").text() == ''){
  alert("Please remove the total row before computing again...");
  return;
  }
  var total_year = 0.00;
  var total_month = 0.00;
  $("[id=total_month]").each(function(e,str){
  var x;
  if(str.innerText == ""){
  x = 0.00;
  }
  else{
  x = str.innerText.split(",").join("");
  }
  total_month = total_month + parseFloat(x,2);
  console.log(x);
  });
  $("[id=total_year]").each(function(e,str){
  var x;
  if(str.innerText == ""){
  x = 0.00;
  }
  else{
  x = str.innerText.split(",").join("");
  }
  
  total_year = total_year + parseFloat(x,2);
  });
  // console.log(total_month);
  // console.log(total_month);
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  // var k = '<tr>   <td contenteditable="true"><b>Total Income</b></td> <td contenteditable="true" style="text-align:right;" id="tots">'+ total_month.toFixed(2) +'</td> <td contenteditable="true" style="text-align:right;">'+ total_year +'</td>            <td style="text-align:right;">    <span class="table-remove glyphicon glyphicon-remove no-print"></span>      </td>                    <td class="no-print text-right">                      <span class="table-up glyphicon glyphicon-arrow-up"></span>  <span class="table-down glyphicon glyphicon-arrow-down"></span>         </td>    </tr>';
  $('#description', $clone).html("<b id='total_income_row'>Total Income</b>");
  $('#total_month', $clone).html("<b>"+ number_format(total_month,'2','.',',') +"</b>");
  $('#total_year', $clone).html("<b>"+ number_format(total_year,'2','.',',') +"</b>");
  $TABLE.find('table').append($clone);
  //$EXPORT.text(JSON.stringify(data));
  });
  function insertValue(e,description,month_val,year_val,ids){
  
  if(e.checked){
  if(month_val != ""){
  month_val =  number_format(month_val,'2','.',',');
  }
  if(year_val != ""){
  year_val =  number_format(year_val,'2','.',',');
  }
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  $('#description', $clone).html(description);
  $('#total_month', $clone).html(month_val);
  $('#total_year', $clone).html(year_val);
  $($clone[0]).attr("id", ids);
  console.log($clone[0]);
  $TABLE.find('table').append($clone);
  }else{
  $("#"+ ids).detach();
  }
  }
  </script>
  @endsection