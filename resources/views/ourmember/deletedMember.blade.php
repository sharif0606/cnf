@extends('layout.app')
@section('pageTitle',trans('Deleted Member List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div class="row pb-1">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary float-end" onclick="get_print()"><i class="bi bi-filetype-xlsx"></i>Export Excel</button>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no" value="{{isset($_GET['member_serial_no'])?$_GET['member_serial_no']:''}}" placeholder="Member ID Old" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no_new" value="{{isset($_GET['member_serial_no_new'])?$_GET['member_serial_no_new']:''}}" placeholder="Member ID New" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="name_bn" value="{{isset($_GET['name_bn'])?$_GET['name_bn']:''}}" placeholder="Member Name" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="renew_serial_no" value="{{isset($_GET['renew_serial_no'])?$_GET['renew_serial_no']:''}}" placeholder="RS NO" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <select name="status" id="" class="form-control">
                                        <option value="">All</option>
                                        <option value="1" @if(isset($_GET['status']) && $_GET['status']==1) selected @endif>Active</option>
                                        <option value="2" @if(isset($_GET['status']) && $_GET['status']==2) selected @endif>Owner</option>
                                        <option value="3" @if(isset($_GET['status']) && $_GET['status']==3) selected @endif>Retired</option>
                                        <option value="4" @if(isset($_GET['status']) && $_GET['status']==4) selected @endif>Late</option>
                                        <option value="5" @if(isset($_GET['status']) && $_GET['status']==5) selected @endif>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                    <a class="btn btn-sm btn-warning" href="{{route(currentUser().'.deleted_member')}}">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ক্রমিক নং')}}</th>
                                <th scope="col">{{__('নাম')}}</th>
                                <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
                                <th scope="col">{{__('পিতার নাম')}}</th>
                                <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
                                <th scope="col">{{__('রক্তের গ্রুপ')}}</th>
                                <th scope="col">{{__('এনআইডি')}}</th>
                                <th scope="col">{{__('চাকুরীর পদবি')}}</th>
                                <th scope="col">{{__('Deleted By')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $key=>$p)
                            <tr>
                                <th scope="row">{{ $ourmember->firstItem() + $key }}</th>
                                <td>{{$p->name_bn}}</td>
                                <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
                                <td>{{$p->father_name}}</td>
                                <td>{{$p->personal_phone}}</td>
                                <td>{{$p->blood_group}}</td>
                                <td>{{$p->nid}}</td>
                                <td>{{$p->designation_of_present_job}}</td>
                                <td>{{$p->deletedBy?->name}}</td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $ourmember->withQueryString()->links()!!}
                    </div>
                    <div class="modal fade" id="balance" tabindex="-1" role="dialog"
                        aria-labelledby="balanceTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header py-1">
                                    <h5 class="modal-title" id="batchTitle">Payment History</h5>
                                    <button type="button" class="close text-danger" data-bs-dismiss="modal"  aria-label="Close">
                                        <i class="bi bi-x-lg" style="font-size: 1.5rem;"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="bg-light">
                                                <th>নাম</th>
                                                <td id="memberName"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সিরিয়াল পুরাতন/নতুন</th>
                                                <td id="memberSerial"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>মোট পেমেন্ট</th>
                                                <td id="totalAmount"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সর্বশেষ পেমেন্ট</th>
                                                <td id="lastPaid"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সর্বশেষ পেমেন্ট সাল</th>
                                                <td id="lastPayYear"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-info" id="moreDetailsLink" href="#" >More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="full_page"></div>
<div id="my-content-div" class="d-none"></div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/tableToExcel.js') }}"></script>
<script>
    function exportReportToExcel(idname, filename, columnsToExport) {
        let table = document.getElementsByTagName(idname);
        let tableToExport = table[2].cloneNode(true);

        // Remove columns that are not in the columnsToExport array
        for (let i = 0; i < tableToExport.rows.length; i++) {
            for (let j = tableToExport.rows[i].cells.length - 1; j >= 0; j--) {
                if (columnsToExport.indexOf(j) === -1) {
                    tableToExport.rows[i].deleteCell(j);
                }
            }
        }

        TableToExcel.convert(tableToExport, {
            name: `${filename}.xlsx`,
            sheet: {
                name: 'Member'
            }
        });

        $("#my-content-div").html("");
        $('.full_page').html("");
    }

    function get_print() {
        $('.full_page').html('<div style="background:rgba(0,0,0,0.5);width:100vw; height:100vh;position:fixed; top:0; left;0"><div class="loader my-5"></div></div>');
        
        $.get(
            "{{route(currentUser().'.archive_member')}}{{ ltrim(Request()->fullUrl(),Request()->url()) }}",
            function (data) {
                $("#my-content-div").html(data);
            }
        ).then(function () {
            // Specify the columns you want to export (0-indexed)
            let columnsToExport = [1, 4]; // Adjust this array based on your requirements
            exportReportToExcel('table', 'Archive Member', columnsToExport);
        });
    }
</script>
@endpush
