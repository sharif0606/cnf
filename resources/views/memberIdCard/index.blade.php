@extends('layout.app')

@section('pageTitle',trans('Member ID Card List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('Search Filters')}}</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{route(currentUser().'.memberIdCard.index')}}">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <input type="text" name="card_number" class="form-control" placeholder="Card Number" value="{{request('card_number')}}">
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="text" name="member_name" class="form-control" placeholder="Member Name" value="{{request('member_name')}}">
                            </div>
                            <div class="col-md-2 mb-2">
                                <select name="card_type" class="form-select">
                                    <option value="">Card Type</option>
                                    <option value="1" {{request('card_type')=='1'?'selected':''}}>NFC</option>
                                    <option value="2" {{request('card_type')=='2'?'selected':''}}>RFID</option>
                                    <option value="3" {{request('card_type')=='3'?'selected':''}}>Plastic</option>
                                    <option value="4" {{request('card_type')=='4'?'selected':''}}>Other</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <select name="card_status" class="form-select">
                                    <option value="">Card Status</option>
                                    <option value="1" {{request('card_status')=='1'?'selected':''}}>Active</option>
                                    <option value="0" {{request('card_status')=='0'?'selected':''}}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{route(currentUser().'.memberIdCard.index')}}" class="btn btn-secondary">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <a class="float-end" href="{{route(currentUser().'.memberIdCard.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                        <thead>
                            <tr class="text-center">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Card Number')}}</th>
                                <th scope="col">{{__('Member Name')}}</th>
                                <th scope="col">{{__('Member Serial')}}</th>
                                <th scope="col">{{__('Card Type')}}</th>
                                <th scope="col">{{__('Card Status')}}</th>
                                <th scope="col">{{__('Allocation Date')}}</th>
                                <th scope="col">{{__('Expiration Date')}}</th>
                                <th class="white-space-nowrap">{{__('ACTION')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cards as $card)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration + ($cards->currentPage() - 1) * $cards->perPage() }}</th>
                                <td>{{$card->card_number}}</td>
                                <td>{{$card->member->name_bn ?? $card->member->name_en ?? 'N/A'}}</td>
                                <td>{{$card->member->member_serial_no ?? 'N/A'}}</td>
                                <td>
                                    <span class="badge bg-info">{{$card->card_type_name}}</span>
                                </td>
                                <td>
                                    @if($card->card_status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{date('d M Y', strtotime($card->card_allocation_date))}}</td>
                                <td>{{$card->card_expiration_date ? date('d M Y', strtotime($card->card_expiration_date)) : 'N/A'}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.memberIdCard.show',encryptor('encrypt',$card->id))}}" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route(currentUser().'.memberIdCard.edit',encryptor('encrypt',$card->id))}}" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="text-danger" href="javascript:void()" onclick="$('#form{{$card->id}}').submit()" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$card->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.memberIdCard.destroy',encryptor('encrypt',$card->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-warning">{{__('No Data Found')}}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $cards->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection

