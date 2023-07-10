@extends('layout.app')
@section('pageTitle',trans('Page List'))
@section('pageSubTitle',trans('List'))
@section('content')
    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <div class="float-end">
                            <a class="float-end" href="{{route(currentUser().'.page.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                        </div>
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Title')}}</th>
                                    <th scope="col">{{__('Published')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($page as $m)
                                <tr class="text-center">
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$m->page_title}}</td>
                                    
                                    <td>{{ $m->published == 1?"Show":"Hide" }}</td>
                                    <td class="white-space-nowrap">
                                        <a class="btn btn-sm btn-success" href="{{route(currentUser().'.page.edit',encryptor('encrypt',$m->id))}}">Edit</a>
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
                            {!! $page->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection