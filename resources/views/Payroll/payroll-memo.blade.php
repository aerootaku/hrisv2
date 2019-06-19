@extends('layout.app')



@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->
        <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Employee Payroll Memo List
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">&nbsp;
                                    <a href="#" onclick="printDiv('printableArea')"  class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-print"></i>
                                     Print
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" id="printableArea">
                        <!--begin: Search Form -->
                        <!--begin: Datatable -->
                   <h4><p>   Unionbank of the Philippines – Libis Branch <br/>
                        184-B E. Rodriguez Jr. Avenue, Bagumbayan,<br/><br/>
                        RE: AUTHORIZATION TO DEBIT <br/><br/>

                        Date:  December 27, 2018    <br/><br/>
                        This is to authorize Unionbank of the Phils. to debit CA/SA Account No. <u>{{$company_details[0]}} </u> of <br/>
                        RedBasket, Inc.  In the total amount of          Php <u>{{number_format($total_amount,2)}} </u>  <br/>
                        our employees (as indicated below) on <br/></p></h4>
                        <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="">
                            <thead>
                            <tr>
                                <th>Employer ACCT. #</th>
                                <th>EMP ACCT. #</th>
                                <th>Amount</th>
                                <th>SURNAME</th>
                                <th>FIRSTNAME</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->account_number }}</td>
                                    <td>{{ $row->bank_account }}</td>
                                    <td>{{number_format($row->net_pay,2)}}</td>
                                    <td>{{$row->lastname}}</td>
                                    <td>{{$row->firstname}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <th>{{number_format($total_amount,2)}}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable -->

                        <h4><p>  {{$company_details[2]}} <br/> {{$company_details[1]}} <br/>
                      TEL.  {{$company_details[3]}} FAX  {{$company_details[4]}} TIN  {{$company_details[5]}}
                            </p></h4>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Dashboard 1-->
    </div>

@endsection


@section('script')

    <script >
        $('#payroll_table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );

    </script>

    <script src="{{ asset('assets') }}/app/custom/general/crud/datatables/extensions/responsive.js" type="text/javascript"></script>

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

@endsection

