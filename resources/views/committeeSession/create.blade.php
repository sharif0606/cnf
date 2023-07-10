@extends('layout.app')

@section('pageTitle',trans('Create Committee Session'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.committeeSession.store')}}">
                              @csrf
                                  <div class="row mb-3">
                                      <label for="session" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Session(yyyy-yyyy)')}}<span class="text-danger">*</span></b></label>
                                      <div class="col-sm-6 offset-1 m-0">
                                          <input type="text" value="{{ old('session')}}" class="form-control" name="session" required>
                                      </div>
                                  </div>
                                  <div class="col-6 offset-3 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                  </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection