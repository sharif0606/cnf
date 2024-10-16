@extends('layout.app')
@section('pageTitle',trans('Approved Member List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
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
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="member_serial_no" value="{{isset($_GET['member_serial_no'])?$_GET['member_serial_no']:''}}" placeholder="Member ID Old" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="member_serial_no_new" value="{{isset($_GET['member_serial_no_new'])?$_GET['member_serial_no_new']:''}}" placeholder="Member ID New" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name_bn" value="{{isset($_GET['name_bn'])?$_GET['name_bn']:''}}" placeholder="Member Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="nid" value="{{isset($_GET['nid'])?$_GET['nid']:''}}" placeholder="NID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="license" value="{{isset($_GET['license'])?$_GET['license']:''}}" placeholder="license" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="date" name="approve_date" value="{{isset($_GET['approve_date'])?$_GET['approve_date']:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="year" value="{{isset($_GET['year'])?$_GET['year']:''}}" placeholder="payment year" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-sm btn-info" type="submit">Search</button>
                                            <a class="btn btn-sm btn-warning" href="{{route(currentUser().'.approve_member')}}">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- <div>
                    <a class="float-end" href="{{route(currentUser().'.ourMember.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div> --}}
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ক্রমিক নং')}}</th>
                                <th scope="col">{{__('নাম')}}</th>
                                <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
                                <th scope="col">{{__('পাসওয়ার্ড')}}</th>
                                <th scope="col">{{__('SMS')}}</th>
                                <th scope="col">{{__('আর এস')}}</th>
                                <th scope="col">{{__('পিতার নাম')}}</th>
                                <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
                                <th scope="col">{{__('সর্বশেষ রিনিউ')}}</th>
                                <th scope="col">{{__('এনআইডি')}}</th>
                                <th scope="col">{{__('চাকুরীর পদবি')}}</th>
                                <th scope="col">{{__('জেলা')}}</th>
                                <th scope="col">{{__('রক্তের গ্রুপ')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $key=>$p)
                            <tr>
                                <th scope="row">
                                    {{-- {{ $ourmember->firstItem() + $key }} --}}
                                    @if ($ourmember instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        {{ $ourmember->firstItem() + $key }}
                                    @else
                                        {{ $key + 1 }}
                                    @endif
                                </th>
                                <td>{{$p->name_bn}}</td>
                                <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
                                <td>{{$p->profile_view_password}}</td>
                                <td>
                                    @if ($p->sms_send != 0)
                                        Send
                                    @else
                                        Not Send
                                    @endif
                                </td>
                                <td>
                                    @if ($p->renew_serial_no != '')
                                        {{$p->renew_serial_no}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{$p->father_name}}</td>
                                <td>{{$p->personal_phone}}</td>
                                <td>{{ $p->fee_collection_last?->year }}</td>
                                <td>{{$p->nid}}</td>
                                <td>{{$p->designation_of_present_job==4?$p->others_designation:$p->designation_of_present_job}}</td>
                                <td>{{$p->district}}</td>
                                <td>{{$p->blood_group}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.ourMember.show',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>&nbsp;
                                    <a href="{{route(currentUser().'.ourMember.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> &nbsp;
                                    {{-- <a class="text-danger" href="{{route(currentUser().'.trans_history',$p->id)}}">
                                        <i class="bi bi-currency-dollar"></i>
                                    </a>&nbsp; --}}
                                    @if(currentUser() == 'chairman')
                                    <a class="btn btn-sm btn-danger" href="{{route(currentUser().'.to_approve_cancel_member',encryptor('encrypt',$p->id))}}">
                                        Cancel
                                    </a>&nbsp;
                                    @endif
                                    {{--<a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.ourMember.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>--}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="11" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        @if ($ourmember instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {!! $ourmember->withQueryString()->links()!!}
                        @else
                        @endif
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
        let tableToExport = table[1].cloneNode(true);

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
            "{{route(currentUser().'.approve_member_print')}}{!! ltrim(Request()->fullUrl(),Request()->url()) !!}",
            function (data) {
                $("#my-content-div").html(data);
            }
        ).then(function () {
            // Specify the columns you want to export (0-indexed)
            //let columnsToExport = [1,7]; // Adjust this array based on your requirements
            //exportReportToExcel('table', 'Approve Member', columnsToExport);
            exportReportToExcel('table', 'Approve Member');
        });
    }

</script>
@endpush