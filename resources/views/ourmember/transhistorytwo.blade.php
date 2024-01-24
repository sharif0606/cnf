@extends('layout.app')
@section('pageTitle',trans('Transection History'))
@section('pageSubTitle',trans('History'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="text-center no_print"><h4>Transection Report</h4></div>
                    <div class="card-body">
                        <form class="form" method="get" action="">
                            <div class="row no_print">
                                <div class="col-md-2 mt-2">
                                    <label for="fdate" class="float-end"><h6>{{__('From Date')}}</h6></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" id="fdate" class="form-control" value="{{isset($_GET['fdate'])?$_GET['fdate']:''}}" name="fdate">
                                </div>


                                <div class="col-md-2 mt-2">
                                    <label for="tdate" class="float-end"><h6>{{__('To Date')}}</h6></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" id="tdate" class="form-control" value="{{isset($_GET['tdate'])?$_GET['tdate']:''}}" name="tdate">
                                </div>
                            </div>
                            <div class="row m-4 no_print">
                                <div class="col-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-success me-1 mb-1 ps-5 pe-5">{{__('Show')}}</button>
                                </div>
                                <div class="col-6 d-flex justify-content-Start">
                                    <a href="{{route(currentUser().'.trans_history_all')}}" class="btn pbtn btn-sm btn-warning me-1 mb-1 ps-5 pe-5">{{__('Reset')}}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <h6 class="m-0 p-0">Summary</h6>
                                    <table class="table table-bordered border-info">
                                        <tr>
                                            <td style="width: 50%;">Total Voucher</td>
                                            <td>{{$totalVouchers}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Member</td>
                                            <td>{{$totalMembers}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td>{{money_format($totalAmount)}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                    <tr class="bg-primary text-white text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Fee Year')}}</th>
                                        <th scope="col">{{__('Voucher')}}</th>
                                        <th scope="col">{{__('Date')}}</th>
                                        <th scope="col">{{__('Receipt No')}}</th>
                                        <th scope="col">{{__('Code')}}</th>
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Amount')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($feeDetail as $fee)
                                    <tr class="text-center">
                                        <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$fee->feeCollection?->year}}</td>
                                        <td>{{$fee->feeCollection?->vhoucher_no}}</td>
                                        <td>{{ (\Carbon\Carbon::parse($fee->feeCollection?->date)->format('d-m-Y') ) }}</td>
                                        <td>{{$fee->feeCollection?->receipt_no}}</td>
                                        <td>{{$fee->code}}</td>
                                        <td>{{$fee->name}}</td>
                                        <td class="text-end">{{money_format($fee->amount)}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
