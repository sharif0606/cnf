@extends('layout.app')

@section('pageTitle',trans('Bank List'))
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
                            <a class="float-end" href="{{route(currentUser().'.bank.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Bank Name')}}</th>
                                        <th scope="col">{{__('Branch Name')}}</th>
                                        <th scope="col">{{__('Account No')}}</th>
                                        <th scope="col">{{__('Routing No')}}</th>
                                        <th scope="col">{{__('Account Name')}}</th>
                                        <th scope="col">{{__('Logo')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $b)
                                    <tr class="text-center">
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$b->name_of_bank}}</td>
                                        <td>{{$b->branch_name}}</td>
                                        <td>{{$b->account_number}}</td>
                                        <td>{{$b->routing_number}}</td>
                                        <td>{{$b->account_name}}</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('uploads/banklogo/'.$b->logo)}}" alt="logo"></td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.bank.edit',encryptor('encrypt',$b->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a class="text-danger" href="javascript:void()" onclick="$('#form{{$b->id}}').submit()">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="form{{$b->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.bank.destroy',encryptor('encrypt',$b->id))}}" method="post">
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
                                {!! $data->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection