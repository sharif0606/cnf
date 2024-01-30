@extends('layout.app')

@section('pageTitle',trans('Update Executive Committee'))
@section('pageSubTitle',trans('update'))
@push('styles')
{{-- choice css --}}
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush
@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.exeCommittee.update',encryptor('encrypt',$exeCommittee->id))}}">
                              @csrf
                              @method('patch')
                                <div class="row mb-3">
                                    <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Member')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1 m-0">
                                    <select class="form-control choices form-select" name="member_id" required>
                                        <option value="">Select Member</option>
                                        @forelse($ourMember as $d)
                                            <option value="{{$d->id}}" {{ old('member_id',$exeCommittee->member_id)==$d->id?"selected":""}}>{{ $d->name_bn}}--Member No-{{ $d->member_serial_no}}--RSL-{{ $d->renew_serial_no}}</option>
                                        @empty
                                            <option value="">No Data found</option>
                                        @endforelse
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Session')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1 m-0">
                                    <select class="form-control form-select" name="session_id" required>
                                        <option value="">Select Session</option>
                                        @forelse($comSession as $d)
                                            <option value="{{$d->id}}" {{ old('session_id',$exeCommittee->committee_sessions_id)==$d->id?"selected":""}}>{{ $d->start_year}}-{{ $d->end_year}}</option>
                                        @empty
                                            <option value="">No Data found</option>
                                        @endforelse
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Designation')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1 m-0">
                                        <input type="text" class="form-control" name="designation" value="{{old('designation',$exeCommittee->designation)}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Order By')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1 m-0">
                                        <input type="number" class="form-control" name="order_by" value="{{old('order_by',$exeCommittee->order_by)}}" required>
                                    </div>
                                </div>
                                <div class="col-6 offset-3 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info me-1 mb-1">{{__('Update')}}</button>
                                </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
@push('scripts')
<script src="{{ asset('/assets/extensions/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/form-element-select.js')}}"></script>
@endpush