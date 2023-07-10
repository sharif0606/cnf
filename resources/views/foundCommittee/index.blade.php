@extends('layout.app')
@section('pageTitle',trans('Founding Executive Committee List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div>
                    <a class="float-end" href="{{route(currentUser().'.foundCommittee.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Member ID')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Club Designation')}}</th>
                                <th scope="col">{{__('Profession')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($foundingMember as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->member?->full_name}} </td>
                                <td>{{$p->member?->membership_no}}</td>
                                <td>{{$p->member?->email}}</td>
                                <td>{{$p->member?->club_designation}}</td>
                                <td>{{$p->member?->profession}}</td>
                                <td>{{$p->member?->cell_number}}</td>
                                <td class="white-space-nowrap">
                                    
                                    <a class="text-danger" href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.foundCommittee.destroy',encryptor('encrypt',$p->id))}}" method="post">
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
                    <div class=" my-3">
                        {!! $foundingMember->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
