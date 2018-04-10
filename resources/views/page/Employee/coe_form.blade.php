
@extends('layouts.app')


@section('page-title')
  Employee Profile
@endsection

@section('content-title')
  Employee Profile
@endsection

<?php
  
  use \Carbon\Carbon;



  $jobfirst = $Employee->getJobHistory->first();
  $jobLast = $Employee->getJobHistory->last();
?>

@section('content')



    <div class="row no-print">


        <div class="col-md-12 ">

        <div class="panel col-md-6">

          Choose any item to be included below.
           <div class="form-group">
                         
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Rice Allowance","2500.00","30000.00")'>
                            Rice Allowance
                          
                          <br>
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Meal Allowance","800.00","9600.00")'>
                            Meal Allowance
                       
                          <br>
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Representation Allowance","3900.00","46800.00")'>
                            Representation Allowance
                          <br>
                              <input type="checkbox" class="flat-red" onclick='insertValue(this,"Fixed Overtime","1500.00","18000.00")'>
                            Fixed Overtime
                      
                         <br>
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Load Allowance","800.00","9600.00")'>
                            Load Allowance
                         <br>
                       
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Medical Allowance","","8000.00")'>
                            Medical Allowance
                         <br>
                         
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Clothing Allowance","","6000.00")'>
                            Clothing Allowance
                         <br>
                         
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Anniversary Bonus","","5000.00")'>
                            Anniversary Allowance
                          <br>
                             <input type="checkbox" class="flat-red" onclick='insertValue(this,"Cash Gift","","5000.00")'>
                             Cash Gift
                         <br>
                            <input type="checkbox" class="flat-red" onclick='insertValue(this,"Financial Assistance","","25000.00")'>
                            Financial Assistance

                          <br>
                             <input type="checkbox" class="flat-red" onclick='insertValue(this,"Mobility Allowance","600.00","7200.00")'>
                             Mobility Allowance
            
                         
                          
            </div>
        </div>
      
    </div>
    </div>

    <section class="invoice">
          <!-- title row -->
         {{--  <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <small class="pull-right">Date: 2/10/2014</small>
              </h2>
            </div>
            <!-- /.col -->
          </div> --}}
          <!-- info row -->
     
          <!-- /.row -->

          <!-- Table row -->

          <style type="text/css">
              tr,th,td {

                  padding-top: 0px;
                  padding-bottom: 0px;

              }
              table{
                width: 100%;
              }
          </style>


          <div class="col-xs-12" style="height:150px;"></div>
          <div class="row">
            <div style="text-align: center;">
                
              <h4>CERTIFICATE OF EMPLOYMENT</h4>
              <img src='{{ URL("user/".$Employee->cfcodeno."/avatar") }}' class="img" alt="User Image" style="width: 150px;">
            </div>
          </div>

          <div class="row">
            To whom it may concern:
          </div>
          <br>
          <div class="row" >
            <p style="text-indent: 50px;">This is to certify that based on record,<b> {{ $Employee->cfsex == "MALE"?"Mr.":"Ms." }} {{ $Employee->cffname }} {{ $Employee->cfmname }} {{ $Employee->cflname }}</b>, whose picture appears herein, is an employee of the Camarines Sur 1 Electric Cooperative, Inc. (CASURECO 1) from <b>{{ Carbon::parse($Employee->dfhired)->format('F d, Y') }}</b> and has held the position of <b>{{ $jobLast['cftitle'] }}</b> from 
            <b>{{ Carbon::parse($jobLast['dfdate1'])->format('F d, Y') }}</b> up to <b>
            {{ $Employee->cfstatus[0] !=  "A" || $Employee->dfout != "0000-00-00"  ?  Carbon::parse($Employee->dfout)->format('F d, Y') : "present"}} </b>  with the following compensation, to wit:</p>
          </div>
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


          <div class="row" style="padding-left: 50px;padding-right: 50px;">

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
          <div class="row" >
            <p>This is being issued for <span  contenteditable="true">[DOUBLE CLICK HERE TO EDIT]</span> this {{ Carbon::now()->format(' jS \d\a\y \of F Y') }} at CASURECO I Main Office, Puro-Batia, Libmanan, Camarines Sur, Philippines.</p>
          </div>
           <div class="col-xs-12" style="height:40px;"></div>
          <div class="row">
             <span class="text-muted pull-left">Not valid without CASURECO 1 dry seal</span>
            <div class="pull-right" style=" width:200px; text-align:center;">

              <B>ANA SYLVIA M. ALSISTO</B>
              <br>
                  General Manager
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
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button id="export-btn" type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Display Total
              </button>
            </div>
          </div>
        </section>

@endsection

@section('scripts')
<script>
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

  $('#description', $clone).html("<b>Total Income</b>");
  $('#total_month', $clone).html("<b>"+ number_format(total_month,'2','.',',') +"</b>");
  $('#total_year', $clone).html("<b>"+ number_format(total_year,'2','.',',') +"</b>");

  $TABLE.find('table').append($clone);
  //$EXPORT.text(JSON.stringify(data));
});


function insertValue(e,description,month_val,year_val){

   

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
     $TABLE.find('table').append($clone);

     }

}

</script>

@endsection