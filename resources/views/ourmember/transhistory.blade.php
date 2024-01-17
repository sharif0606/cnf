@extends('layout.app')
@section('pageTitle',trans('Transection History'))
@section('pageSubTitle',trans('History'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Member')}}</th>
                                <th scope="col">{{__('Date')}}</th>
                                <th scope="col">{{__('Year')}}</th>
                                <th scope="col">{{__('Receipt No')}}</th>
                                <th scope="col">{{__('Total Amount')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->member?->name_bn}}</td>
                                <td>{{ (\Carbon\Carbon::parse($p->date)->format('d-m-Y') ) }}</td>
                                <td>{{$p->year}}</td>
                                <td>{{$p->receipt_no}}</td>
                                <td>{{$p->total_amount}}</td>
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
</section>
@endsection
