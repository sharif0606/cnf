@extends('layout.app')

@section('pageTitle',trans('Create Tag'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.tag.store')}}">
                              @csrf
                                  <div class="row mb-3">
                                      <label for="name" class="col-sm-2 offset-1 col-form-label"><b>{{__('Tag Name')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" id="tag" value="{{ old('tag')}}" class="form-control"
                                              placeholder="Tag Name" name="tag" required>
                                      </div>
                                  </div>
                                  
                                  <div class="col-8 offset-2 d-flex justify-content-end">
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