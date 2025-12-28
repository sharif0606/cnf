@extends('layout.app')

@section('pageTitle',trans('View Member ID Card'))
@section('pageSubTitle',trans('Details'))

@section('content')
<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('ID Card Details')}}</h4>
                    <div class="float-end">
                        <a href="{{route(currentUser().'.memberIdCard.index')}}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> {{__('Back')}}
                        </a>
                        <a href="{{route(currentUser().'.memberIdCard.edit', encryptor('encrypt', $memberIdCard->id))}}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i> {{__('Edit')}}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Member Information -->
                        <div class="col-md-6">
                            <h5 class="mb-3 text-primary">{{__('Member Information')}}</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">{{__('Member Name')}}</th>
                                    <td>: {{$memberIdCard->member->name_bn ?? $memberIdCard->member->name_en ?? 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Member Serial No')}}</th>
                                    <td>: {{$memberIdCard->member->member_serial_no ?? 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('NID')}}</th>
                                    <td>: {{$memberIdCard->member->nid ?? 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Phone')}}</th>
                                    <td>: {{$memberIdCard->member->personal_phone ?? 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Blood Group')}}</th>
                                    <td>: {{$memberIdCard->member->blood_group ?? 'N/A'}}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <!-- Card Information -->
                        <div class="col-md-6">
                            <h5 class="mb-3 text-success">{{__('Card Information')}}</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">{{__('Card Number')}}</th>
                                    <td>: <strong>{{$memberIdCard->card_number}}</strong></td>
                                </tr>
                                <tr>
                                    <th>{{__('Card Type')}}</th>
                                    <td>: <span class="badge bg-info">{{$memberIdCard->card_type_name}}</span></td>
                                </tr>
                                <tr>
                                    <th>{{__('Card Status')}}</th>
                                    <td>: 
                                        @if($memberIdCard->card_status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{__('Allocation Date')}}</th>
                                    <td>: {{date('d M Y', strtotime($memberIdCard->card_allocation_date))}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Expiration Date')}}</th>
                                    <td>: {{$memberIdCard->card_expiration_date ? date('d M Y', strtotime($memberIdCard->card_expiration_date)) : 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Created At')}}</th>
                                    <td>: {{date('d M Y H:i', strtotime($memberIdCard->created_at))}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Updated At')}}</th>
                                    <td>: {{date('d M Y H:i', strtotime($memberIdCard->updated_at))}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    @if($memberIdCard->member->image)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="mb-3">{{__('Member Photo')}}</h5>
                            <img src="{{ asset('uploads/memberImage/'.$memberIdCard->member->image) }}" 
                                 alt="Member Photo" 
                                 class="img-thumbnail"
                                 style="max-width: 200px;"
                                 onerror="this.onerror=null;this.src='{{ asset('image/noimage.jpg') }}';">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

