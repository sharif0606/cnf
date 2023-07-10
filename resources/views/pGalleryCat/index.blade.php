@extends('layout.app')

@section('pageTitle',trans('Photo Album List'))
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
                            <a class="float-end" href="{{route(currentUser().'.pGalleryCat.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Album Name')}}</th>
                                        <th scope="col">{{__('Photo Year')}}</th>
                                        <th scope="col">{{__('Feature Image')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pGalleryCat as $cat)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->name}}</td>
                                        <td>{{$cat->year?->year}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGcategory/'.$cat->feature_image)}}" alt=""></td>
                                        <td>{{ $cat->status == 1?"Active":"Inactive" }}</td>
                                        <td class="white-space-nowrap">
                                            <a class="btn btn-sm btn-success" href="{{route(currentUser().'.pGalleryCat.edit',encryptor('encrypt',$cat->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center">No data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="my-3">
                                {!! $pGalleryCat->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection