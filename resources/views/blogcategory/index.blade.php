@extends('layout.app')

@section('pageTitle',trans('Blog Category List'))
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
                            <a class="float-end" href="{{route(currentUser().'.blogcategory.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Category Name')}}</th>
                                        <th scope="col">{{__('Feature Image')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogcat as $cat)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->category_name}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/BlogCategory/'.$cat->feature_image)}}" alt=""></td>
                                        <td>{{ $cat->status == 1?"Active":"Inactive" }}</td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.blogcategory.edit',encryptor('encrypt',$cat->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$cat->id}}" action="{{route(currentUser().'.blogcategory.destroy',encryptor('encrypt',$cat->id))}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">No Category Found</th>
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
