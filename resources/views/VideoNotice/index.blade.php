@extends('layout.app')

@section('pageTitle',trans('News & Events List'))
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
                            <a class="float-end" href="{{route(currentUser().'.vNotice.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Title')}}</th>
                                        <th scope="col">{{__('Short Description')}}</th>
                                        <th scope="col">{{__('Picture')}}</th>
                                        {{-- <th scope="col">{{__('Publish Date')}}</th> --}}
                                        <th scope="col">{{__('Video Link')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($videoNotice as $m)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$m->title}}</td>
                                        <td>{{$m->short_description}}</td>
                                        <td><img width="50px" src="{{asset('uploads/video_notice/'.$m->image)}}" alt=""></td>
                                        {{-- <td>{{$m->publish_date}}</td> --}}
                                        <td>{{$m->link}}</td>
                                        <td class="white-space-nowrap">
                                            <a  href="{{route(currentUser().'.vNotice.edit',encryptor('encrypt',$m->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a href="javascript:void()" onclick="$('#form{{$m->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$m->id}}" action="{{route(currentUser().'.vNotice.destroy',encryptor('encrypt',$m->id))}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="my-3">
                                {!! $videoNotice->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection