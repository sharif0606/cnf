@extends('layout.app')

@section('pageTitle',trans('Executive Committee List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                    <a class="float-end" href="{{route(currentUser().'.exeCommittee.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                        <thead>
                            <tr class="text-center">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Member')}}</th>
                                <th scope="col">{{__('Member ID')}}</th>
                                <th scope="col">{{__('Designation')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th scope="col">{{__('Session')}}</th>
                                <th class="white-space-nowrap">{{__('ACTION')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->member?->full_name}}</td>
                                <td>{{$b->member?->membership_no}}</td>
                                <td>{{$b->member?->designation}}</td>
                                <td>{{$b->member?->cell_number}}</td>
                                <td>{{$b->session?->session_name}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.exeCommittee.edit',encryptor('encrypt',$b->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$b->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$b->id}}" action="{{route(currentUser().'.exeCommittee.destroy',encryptor('encrypt',$b->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <th colspan="6" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $data->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection