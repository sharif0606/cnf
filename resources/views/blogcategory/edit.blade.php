@extends('layout.app')

@section('pageTitle',trans('Update Blog Category'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.blogcategory.update',encryptor('encrypt',$blogcat->id))}}">
                              @csrf
                              @method('patch')
                                  <div class="row mb-3">
                                      <label for="name"class="col-sm-2 offset-1 col-form-label"><b>{{__('Name')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" id="name" value="{{ old('name',$blogcat->category_name)}}" class="form-control"
                                              placeholder="Category Name" name="name">
                                      </div>
                                      @if($errors->has('category'))
                                      <span class="text-danger"> {{ $errors->first('category') }}</span>
                                      @endif
                                  </div>
                                  <div class="row mb-3">
                                      <label for="image"class="col-sm-2 offset-1 col-form-label"><b>{{__('Feature Image')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" id="feature_image" class="form-control"
                                              placeholder="feature image" name="feature_image">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="date"class="col-sm-2 offset-1 col-form-label"><b>{{__('Status')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <select class="form-control form-select" name="status">
                                            <option value="">Select Status</option>
                                                <option value="0" {{ old('status',$blogcat->status)=="0"?"selected":""}}>Inactive</option>
                                                <option value="1" {{ old('status',$blogcat->status)=="1"?"selected":""}}>Active</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="col-8 offset-2 d-flex justify-content-end">
                                  <img width="80px" height="40px" class="float-first" src="{{asset('uploads/BlogCategory/'.$blogcat->feature_image)}}" alt="">
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
