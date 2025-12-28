@extends('layout.app')

@section('pageTitle',trans('Edit Member ID Card'))
@section('pageSubTitle',trans('Edit'))

@section('content')
<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.memberIdCard.update', encryptor('encrypt', $memberIdCard->id))}}">
                            @csrf
                            @method('PUT')
                            
                            <!-- Member Information (Read Only) -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="mb-3">{{__('Member Information')}}</h5>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <h6>{{__('Member:')}}</h6>
                                        <p class="mb-0">
                                            <strong>{{$memberIdCard->member->name_bn ?? $memberIdCard->member->name_en ?? 'N/A'}}</strong><br>
                                            Serial: {{$memberIdCard->member->member_serial_no ?? 'N/A'}} | 
                                            NID: {{$memberIdCard->member->nid ?? 'N/A'}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Card Information Section -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="mb-3">{{__('Card Information')}}</h5>
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="card_number"><b>{{__('Card Number')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('card_number', $memberIdCard->card_number)}}" class="form-control @error('card_number') is-invalid @enderror" name="card_number" id="card_number" required>
                                    @error('card_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="card_type"><b>{{__('Card Type')}}<span class="text-danger">*</span></b></label>
                                    <select name="card_type" id="card_type" class="form-select @error('card_type') is-invalid @enderror" required>
                                        <option value="">Select Card Type</option>
                                        <option value="1" {{old('card_type', $memberIdCard->card_type)==1?'selected':''}}>NFC</option>
                                        <option value="2" {{old('card_type', $memberIdCard->card_type)==2?'selected':''}}>RFID</option>
                                        <option value="3" {{old('card_type', $memberIdCard->card_type)==3?'selected':''}}>Plastic</option>
                                        <option value="4" {{old('card_type', $memberIdCard->card_type)==4?'selected':''}}>Other</option>
                                    </select>
                                    @error('card_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label><b>{{__('Card Status')}}<span class="text-danger">*</span></b></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="card_status" id="status_active" value="1" {{old('card_status', $memberIdCard->card_status)==1?'checked':''}} required>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="card_status" id="status_inactive" value="0" {{old('card_status', $memberIdCard->card_status)==0?'checked':''}}>
                                        <label class="form-check-label" for="status_inactive">
                                            Inactive
                                        </label>
                                    </div>
                                    @error('card_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <label for="card_allocation_date"><b>{{__('Allocation Date')}}<span class="text-danger">*</span></b></label>
                                    <input type="date" value="{{ old('card_allocation_date', $memberIdCard->card_allocation_date)}}" class="form-control @error('card_allocation_date') is-invalid @enderror" name="card_allocation_date" id="card_allocation_date" required>
                                    @error('card_allocation_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <label for="card_expiration_date"><b>{{__('Expiration Date')}}</b></label>
                                    <input type="date" value="{{ old('card_expiration_date', $memberIdCard->card_expiration_date)}}" class="form-control @error('card_expiration_date') is-invalid @enderror" name="card_expiration_date" id="card_expiration_date">
                                    @error('card_expiration_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{route(currentUser().'.memberIdCard.index')}}" class="btn btn-secondary me-1 mb-1">{{__('Cancel')}}</a>
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

