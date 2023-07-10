@extends('layout.app')

@section('pageTitle',trans('Update Executive Committee'))
@section('pageSubTitle',trans('update'))

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
                                    <select class="form-control form-select" name="member_id" required>
                                        <option value="">Select Member</option>
                                        @forelse($ourMember as $d)
                                            <option value="{{$d->id}}" {{ old('member_id',$exeCommittee->member_id)==$d->id?"selected":""}}> {{ $d->given_name}} {{ $d->surname}}</option>
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
                                            <option value="{{$d->id}}" {{ old('session_id',$exeCommittee->committee_sessions_id)==$d->id?"selected":""}}> {{ $d->session_name}}</option>
                                        @empty
                                            <option value="">No Data found</option>
                                        @endforelse
                                    </select>
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Designation')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1 m-0">
                                      <input type="text" class="form-control" value="{{ old('designation',$exeCommittee->designation)}}" name="designation">
                                    </div>
                                </div> --}}
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