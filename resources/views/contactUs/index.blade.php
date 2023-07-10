@extends('layout.app')

@section('pageTitle',trans('Contact Us List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Mobile')}}</th>
                                <th scope="col">{{__('Message')}}</th>
                                <th scope="col">{{__('Reason')}}</th>
                                <th class="white-space-nowrap">{{__('ACTION')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->name}}</td>
                                <td>{{$b->email}}</td>
                                <td>{{$b->mobile}}</td>
                                <td>{{$b->message}}</td>
                                <td>{{$b->contact_reason?->reason}}</td>
                                <td class="white-space-nowrap">
                                    {{-- <a href="{{route(currentUser().'.creason.edit',encryptor('encrypt',$b->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> --}}
                                    <a class="text-danger" href="javascript:void()" onclick="$('#form{{$b->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$b->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.contact.destroy',encryptor('encrypt',$b->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class=" my-3">
                        {!! $data->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection