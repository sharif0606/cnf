@extends('layout.app')

@section('pageTitle',trans('Benefits List'))
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
                            <a class="float-end" href="{{route(currentUser().'.benefit.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Title')}}</th>
                                        <th scope="col">{{__('Details')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($benefit as $b)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$b->benefit}}</td>
                                        <td>{{$b->description}}</td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.benefit.edit',encryptor('encrypt',$b->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="javascript:void()" onclick="$('#form{{$b->id}}').submit()">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$b->id}}" action="{{route(currentUser().'.benefit.destroy',encryptor('encrypt',$b->id))}}" method="post">
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
                                {!! $benefit->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection