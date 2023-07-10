@extends('layout.app')

@section('pageTitle',trans('Update News & Events'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.vNotice.update',encryptor('encrypt',$videoNotice->id))}}">
                              @csrf
                              @method('patch')
                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="text"><b>{{__('Title')}}<span class="text-danger">*</span></b></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title',$videoNotice->title)}}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="text"><b>{{__('Short Description')}}</b></label>
                                        <textarea name="short_description" class="form-control" rows="2">{{ old('short_description',$videoNotice->short_description)}}</textarea>
                                        @if($errors->has('short_description'))
                                            <span class="text-danger"> {{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="text"><b>{{__('Long Description')}}</b></label>
                                        <textarea name="long_description" class="form-control" rows="2">{{ old('long_description',$videoNotice->long_description)}}</textarea>
                                    </div> --}}
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="Picture"><b>{{__('Picture')}}</b></label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="notice"><b>{{__('Notice File')}}</b></label>
                                        <input type="file" class="form-control" name="notice_file">
                                    </div> --}}
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="text"><b>{{__('Video link')}}:</b></label>
                                        <input type="text" class="form-control" name="link" value="{{ old('link',$videoNotice->link)}}">
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="date"><b>{{__('Publish Date')}}:</b></label>
                                        <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date',$videoNotice->publish_date)}}" required>
                                    </div> --}}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
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