@extends('layouts.admin')
@section('page_css')
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<input type='button' class="btn btn-pinterest" id='btn' value='Print' onclick='printDiv();'>
<hr>
<div id='DivIdToPrint'>
        <style>

            table.minimalistBlack {
                border: 3px solid #000000;
                width: 100%;
                text-align: left;
                border-collapse: collapse;
            }
            table.minimalistBlack td, table.minimalistBlack th {
                border: 1px solid #000000;
                padding: 5px 4px;
            }
            table.minimalistBlack tbody td {
                font-size: 13px;
            }
            table.minimalistBlack thead {
                background: #CFCFCF;
                background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                border-bottom: 3px solid #000000;
            }
            table.minimalistBlack thead th {
                font-size: 15px;
                font-weight: bold;
                color: #000000;
                text-align: left;
            }
            table.minimalistBlack tfoot {
                font-size: 14px;
                font-weight: bold;
                color: #000000;
                border-top: 3px solid #000000;
            }
            table.minimalistBlack tfoot td {
                font-size: 14px;
            }
        </style>
        <p align="right">@yield('ref_number')</p>
        <p align="center"><img src="/images/logo.png" alt="logo" width="5%" height="5%"></p>
        <h3 align="center">
            Club'89 Ltd. </br>
            House#7B, Road#13</br>
            Gulshan, Dhaka-1212 </br>
        </h3>
        <h2 align="center">
            <b><u>@yield('reportTitle')</u></b>
        </h2>
        @yield('print_content')
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        @yield('report_footer')
</div>
@endsection

@section('page_scripts')
<script>
function printDiv()
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endsection
