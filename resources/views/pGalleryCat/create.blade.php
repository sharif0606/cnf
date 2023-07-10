@extends('layout.app')

@section('pageTitle',trans('Create Photo Album'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.pGalleryCat.store')}}">
                              @csrf
                                  <div class="row mb-3">
                                      <label for="name" class="col-sm-2 offset-1 col-form-label"><b>{{__('Album Name')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" id="name" value="{{ old('name')}}" class="form-control"
                                              placeholder="Album Name" name="name">
                                      </div>
                                      @if($errors->has('category'))
                                      <span class="text-danger"> {{ $errors->first('category') }}</span>
                                      @endif
                                  </div>
                                  <div class="row mb-3">
                                    <label for="year" class="col-sm-2 offset-1 col-form-label"><b>{{__('Photo Year')}}<span class="text-danger">*</span></b></label>
                                    <div class="col-sm-6 offset-1">
                                            <select class="form-control form-select" name="year" id="year" required>
                                                <option value="">Select Photo year</option>
                                                @forelse($year as $d)
                                                    <option value="{{$d->id}}" {{ old('year')==$d->id?"selected":""}}> {{ $d->year}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                  <div class="row mb-3">
                                      <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Feature Image')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" id="feature_image" class="form-control"
                                              placeholder="feature image" name="feature_image">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="date" class="col-sm-2 offset-1 col-form-label"><b>{{__('Status')}}<span class="text-danger">*</span></b></label>
                                      <div class="col-sm-6 offset-1">
                                          <select class="form-control form-select" value="{{ old('status')}}" name="status" required>
                                            <option value="">Select Status</option>
                                                <option value="0">Inactive</option>
                                                <option value="1">Active</option>
                                        </select>
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