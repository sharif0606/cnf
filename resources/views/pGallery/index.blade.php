{{-- @extends('layout.app')

@section('pageTitle',trans('Photo Gallery List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                        <a class="float-end" href="{{route(currentUser().'.pGallery.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Caption')}}</th>
                                    <th scope="col">{{__('Album')}}</th>
                                    <th scope="col">{{__('Feature Image')}}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pGallery as $cat)
                                <tr class="text-center">
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$cat->Caption}}</td>
                                    <td>{{$cat->photo_gallary_category?->name }}</td>
                                    <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGgallery/'.$cat->feature_image)}}" alt=""></td>
                                    <td>{{ $cat->status == 1?"Active":"Inactive" }}</td>
                                    <td class="white-space-nowrap">
                                        <a  href="{{route(currentUser().'.pGallery.edit',encryptor('encrypt',$cat->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- <a href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$cat->id}}" action="{{route(currentUser().'.pGallery.destroy',encryptor('encrypt',$cat->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form> -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="6" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-3">
                            {!! $pGallery->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</section>
@endsection --}}