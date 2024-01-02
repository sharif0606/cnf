@extends('layout.app')
@section('pageTitle',trans('Approved Member List'))
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
                <div class="row pb-1">
                        <div class="col-12">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input type="text" name="member_serial_no" value="{{isset($_GET['member_serial_no'])?$_GET['member_serial_no']:''}}" placeholder="Member ID" class="form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="name_bn" value="{{isset($_GET['name_bn'])?$_GET['name_bn']:''}}" placeholder="Member Name" class="form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="nid" value="{{isset($_GET['nid'])?$_GET['nid']:''}}" placeholder="NID" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="license" value="{{isset($_GET['license'])?$_GET['license']:''}}" placeholder="license" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-info" type="submit">Search</button>
                                        <a class="btn btn-sm btn-warning" href="{{route(currentUser().'.approve_member')}}">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- <div>
                    <a class="float-end" href="{{route(currentUser().'.ourMember.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div> --}}
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Member ID')}}</th>
                                <th scope="col">{{__('Father\'s Name')}}</th>
                                <th scope="col">{{__('Blood')}}</th>
                                <th scope="col">{{__('NID')}}</th>
                                <th scope="col">{{__('Profession')}}</th>
                                <th scope="col">{{__('Contact No')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name_bn}}</td>
                                <td>{{$p->member_serial_no}}</td>
                                <td>{{$p->father_name}}</td>
                                <td>{{$p->blood_group}}</td>
                                <td>{{$p->nid}}</td>
                                <td>{{$p->profession}}</td>
                                <td>{{$p->personal_phone}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.ourMember.show',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>&nbsp;
                                    <a href="{{route(currentUser().'.ourMember.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> &nbsp;
                                    @if(currentUser() == 'chairman')
                                    <a class="btn btn-sm btn-danger" href="{{route(currentUser().'.to_approve_cancel_member',encryptor('encrypt',$p->id))}}">
                                        Cancel
                                    </a>&nbsp;
                                    @endif
                                    {{--<a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.ourMember.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>--}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end my-3">
                        {!! $ourmember->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
