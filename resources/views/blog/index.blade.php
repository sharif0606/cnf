@extends('layout.app')

@section('pageTitle',trans('Blog List'))
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
                            <a class="float-end" href="{{route(currentUser().'.blog.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Category')}}</th>
                                        <th scope="col">{{__('Title')}}</th>
                                        <th scope="col">{{__('Description')}}</th>
                                        <th scope="col">{{__('Author Name')}}</th>
                                        <th scope="col">{{__('Publish Date')}}</th>
                                        {{-- <th scope="col">{{__('Status')}}</th> --}}
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blog as $b)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$b->blog_category?->category_name}}</td>
                                        <td>{{$b->title}}</td>
                                        <td>{{$b->description}}</td>
                                        <td>{{$b->author_name}}</td>
                                        <td>{{$b->published_date}}</td>
                                        {{-- <td>{{ $b->status == 1?"Active":"Inactive" }}</td> --}}
                                        <td class="white-space-nowrap">
                                            <a class="ebutton" href="{{route(currentUser().'.blog.edit',encryptor('encrypt',$b->id))}}">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="7" class="text-center">No Data Found</th>
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
