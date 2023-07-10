@extends('layout.app')
@section('pageTitle',trans('Slider List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                <div>
                <a class="float-end" href="{{route(currentUser().'.slider.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                {{-- <th scope="col">{{__('Link')}}</th>
                                <th scope="col">{{__('Short Description')}}</th>
                                <th scope="col">{{__('Long Description')}}</th> --}}
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td><img width="100px" src="{{asset('uploads/Slide_image/'.$p->image)}}" alt=""></td>
                                {{-- <td>{{$p->link}}</td>
                                <td>{{$p->short_title}}</td>
                                <td>{{$p->long_title}}</td> --}}
                                <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.slider.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.slider.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $sliders->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
