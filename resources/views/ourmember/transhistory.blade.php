@extends('layout.app')
@section('pageTitle',trans('Transection History'))
@section('pageSubTitle',trans('History'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
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
                            @forelse($data as $fee)
                            <tr class="text-center">
                                <th class="bg-info text-white" scope="row">{{ ++$loop->index }}</th>
                                <td class="bg-info text-white">{{$fee->year}}</td>
                                <td class="bg-info text-white">{{$fee->vhoucher_no}}</td>
                                <td class="bg-info text-white">{{ (\Carbon\Carbon::parse($fee->date)->format('d-m-Y') ) }}</td>
                                <td class="bg-info text-white">{{$fee->receipt_no}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($fee->details as $fd)
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$fd->code}}</td>
                                    <td>{{$fd->name}}</td>
                                    <td class="text-end">{{money_format($fd->amount)}}</td>
                                </tr>
                            @endforeach
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
</section>
@endsection
