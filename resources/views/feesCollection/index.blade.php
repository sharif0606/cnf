@extends('layout.app')
@section('pageTitle',trans('Fees Collection'))
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
                <div class="card-content">
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
                                    <a href="{{route(currentUser().'.feeCollection.index')}}" class="btn pbtn btn-sm btn-warning me-1 mb-1 ps-5 pe-5">{{__('Reset')}}</a>
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
                        <div class="row">
                            <div class="col-12">
                                <a class="float-end" href="{{route(currentUser().'.feeCollection.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            </div>
                        </div>
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
        
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Year')}}</th>
                                        <th scope="col">{{__('Voucher No')}}</th>
                                        <th scope="col">{{__('Member')}}</th>
                                        <th scope="col">{{__('Date')}}</th>
                                        <th scope="col">{{__('Receipt No')}}</th>
                                        <th scope="col">{{__('Amount')}}</th>
                                        <th class="white-space-nowrap">{{__('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $p)
                                    <tr>
                                        <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$p->year}}</td>
                                        <td>{{$p->vhoucher_no}}</td>
                                        <td>{{$p->member?->name_bn}}</td>
                                        <td>{{$p->date}}</td>
                                        <td>{{$p->receipt_no}}</td>
                                        <td>{{$p->total_amount}}</td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.feeCollection.edit',encryptor('encrypt',$p->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {{-- <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$p->id}}" action="{{route(currentUser().'.feeCollection.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="my-3">
                            {!! $data->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
