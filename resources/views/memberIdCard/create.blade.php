@extends('layout.app')

@section('pageTitle',trans('Add Member ID Card'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.memberIdCard.store')}}">
                            @csrf
                            
                            <!-- Member Search Section -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="mb-3">{{__('Search Member')}}</h5>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 mb-2">
                                    <label for="member_search"><b>{{__('Search by Serial No / Name / NID')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" id="member_search" class="form-control" placeholder="Type to search member...">
                                    <div id="search_results" class="list-group mt-2" style="position: absolute; z-index: 1000; max-height: 300px; overflow-y: auto; width: 95%;"></div>
                                </div>
                            </div>
                            
                            <!-- Selected Member Display -->
                            <div id="selected_member" class="row mb-3" style="display: none;">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        <h6>{{__('Selected Member:')}}</h6>
                                        <p class="mb-0" id="member_info"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <input type="hidden" name="member_id" id="member_id" required>
                            
                            <hr>
                            
                            <!-- Card Information Section -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="mb-3">{{__('Card Information')}}</h5>
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="card_number"><b>{{__('Card Number')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('card_number')}}" class="form-control @error('card_number') is-invalid @enderror" name="card_number" id="card_number" required>
                                    @error('card_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="card_type"><b>{{__('Card Type')}}<span class="text-danger">*</span></b></label>
                                    <select name="card_type" id="card_type" class="form-select @error('card_type') is-invalid @enderror" required>
                                        <option value="">Select Card Type</option>
                                        <option value="1" {{old('card_type')=='1'?'selected':''}}>NFC</option>
                                        <option value="2" {{old('card_type',2)=='2'?'selected':''}}>RFID</option>
                                        <option value="3" {{old('card_type')=='3'?'selected':''}}>Plastic</option>
                                        <option value="4" {{old('card_type')=='4'?'selected':''}}>Other</option>
                                    </select>
                                    @error('card_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label><b>{{__('Card Status')}}<span class="text-danger">*</span></b></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="card_status" id="status_active" value="1" {{old('card_status', '1')=='1'?'checked':''}} required>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="card_status" id="status_inactive" value="0" {{old('card_status')=='0'?'checked':''}}>
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
                                    <input type="date" value="{{ old('card_allocation_date', date('Y-m-d'))}}" class="form-control @error('card_allocation_date') is-invalid @enderror" name="card_allocation_date" id="card_allocation_date" required>
                                    @error('card_allocation_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <label for="card_expiration_date"><b>{{__('Expiration Date')}}</b></label>
                                    <input type="date" value="{{ old('card_expiration_date')}}" class="form-control @error('card_expiration_date') is-invalid @enderror" name="card_expiration_date" id="card_expiration_date">
                                    @error('card_expiration_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{route(currentUser().'.memberIdCard.index')}}" class="btn btn-secondary me-1 mb-1">{{__('Cancel')}}</a>
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let searchTimeout;
    
    $('#member_search').on('keyup', function() {
        clearTimeout(searchTimeout);
        let search = $(this).val();
        
        if(search.length < 2) {
            $('#search_results').html('');
            return;
        }
        
        searchTimeout = setTimeout(function() {
            $.ajax({
                url: "{{ route(currentUser().'.memberIdCard.searchMember') }}",
                method: 'GET',
                data: { search: search },
                success: function(data) {
                    let html = '';
                    if(data.length > 0) {
                        data.forEach(function(member) {
                            html += `<a href="javascript:void(0)" class="list-group-item list-group-item-action member-item" 
                                        data-id="${member.id}"
                                        data-name="${member.name_bn || member.name_en}"
                                        data-serial="${member.member_serial_no || 'N/A'}"
                                        data-nid="${member.nid || 'N/A'}">
                                        <strong>${member.name_bn || member.name_en}</strong><br>
                                        <small>Serial: ${member.member_serial_no || 'N/A'} | NID: ${member.nid || 'N/A'}</small>
                                    </a>`;
                        });
                    } else {
                        html = '<div class="list-group-item">No member found</div>';
                    }
                    $('#search_results').html(html);
                }
            });
        }, 300);
    });
    
    $(document).on('click', '.member-item', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let serial = $(this).data('serial');
        let nid = $(this).data('nid');
        
        $('#member_id').val(id);
        $('#member_search').val(name);
        $('#member_info').html(`<strong>${name}</strong><br>Serial: ${serial} | NID: ${nid}`);
        $('#selected_member').show();
        $('#search_results').html('');
    });
    
    $(document).on('click', function(e) {
        if(!$(e.target).closest('#member_search, #search_results').length) {
            $('#search_results').html('');
        }
    });
});
</script>
@endsection

