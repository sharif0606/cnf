@extends('layout.app')

@section('pageTitle',trans('Year List'))
@section('pageSubTitle',trans('List'))

@section('content')
    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route(currentUser().'.year.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Year')}}</th>
                                        <th scope="col">{{__('Feature img for photo')}}</th>
                                        <th scope="col">{{__('Feature img for video')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($year as $cat)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->year}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/yearPhoto/'.$cat->feature_photo)}}" alt=""></td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/yearVideo/'.$cat->feature_video)}}" alt=""></td>
                                        <td class="white-space-nowrap">
                                            <a class="btn btn-sm btn-success" href="{{route(currentUser().'.year.edit',encryptor('encrypt',$cat->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="5" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="my-3">
                                {!! $year->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection