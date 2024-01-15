@extends('layout.app')
@section('pageTitle',trans('Applied Member List'))
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
                    <a class="float-end" href="{{route(currentUser().'.ourMember.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                <div class="row pb-1">
                    <div class="col-12">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no" value="{{isset($_GET['member_serial_no'])?$_GET['member_serial_no']:''}}" placeholder="Member ID Old" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no_new" value="{{isset($_GET['member_serial_no_new'])?$_GET['member_serial_no_new']:''}}" placeholder="Member ID New" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="name_bn" value="{{isset($_GET['name_bn'])?$_GET['name_bn']:''}}" placeholder="Member Name" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nid" value="{{isset($_GET['nid'])?$_GET['nid']:''}}" placeholder="NID" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="license" value="{{isset($_GET['license'])?$_GET['license']:''}}" placeholder="license" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                    <a class="btn btn-sm btn-warning" href="{{route(currentUser().'.ourMember.index')}}">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ক্রমিক নং')}}</th>
                                <th scope="col">{{__('নাম')}}</th>
                                <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
                                <th scope="col">{{__('পিতার নাম')}}</th>
                                <th scope="col">{{__('মাতার নাম')}}</th>
                                <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $key=>$p)
                            <tr>
                                <th scope="row">{{ $ourmember->firstItem() + $key }}</th>
                                <td>{{$p->name_bn}}</td>
                                <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
                                <td>{{$p->father_name}}</td>
                                <td>{{$p->mother_name}}</td>
                                <td>{{$p->personal_phone}}</td>
                                <td class="white-space-nowrap">
                                   
                                    <a href="{{route(currentUser().'.ourMember.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> &nbsp;
                                    <a class="text-danger" href="{{route(currentUser().'.ourMember.show',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                    </a>&nbsp;
                                    @if(currentUser()=="generalsecretary")
                                    <a class="btn btn-sm btn-success" href="{{route(currentUser().'.to_approve_member',encryptor('encrypt',$p->id))}}">
                                        approval
                                    </a>&nbsp;
                                    @endif
                                    <!-- <a class="text-danger" href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.ourMember.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form> -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $ourmember->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
