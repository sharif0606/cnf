@extends('layout.app')

@section('pageTitle',trans('Update Photo Gallery'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.pGallery.update',encryptor('encrypt',$pGallery->id))}}">
                              @csrf
                              @method('patch')
                              <div class="row mb-3">
                                <label for="Caption" class="col-sm-2 offset-1 col-form-label"><b>{{__('Caption')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="text" value="{{ old('Caption',$pGallery->Caption)}}" class="form-control"
                                        placeholder="Caption" name="Caption">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 offset-1 col-form-label"><b>{{__('Album')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1">
                                    <select class="form-control form-select" name="album" id="album">
                                        <option value="">Select Album</option>
                                        @forelse($pGalleryCat as $d)
                                            <option value="{{$d->id}}" {{ old('album',$pGallery->photo_gallary_category_id)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                        @empty
                                            <option value="">No Data found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 offset-1 col-form-label"><b>{{__('Status')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1">
                                    <select class="form-control form-select" name="status">
                                    <option value="">Select Status</option>
                                        <option value="0" {{ old('status',$pGallery->status)=="0"?"selected":""}}>Inactive</option>
                                        <option value="1" {{ old('status',$pGallery->status)=="1"?"selected":""}}>Active</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Gallery Photo')}}:</b></label>
                                <div class="col-sm-6 offset-1">
                                    <input type="file"  class="form-control"
                                        name="feature_image">
                                </div>
                            </div>
                                  
                            <div class="col-8 offset-2 d-flex justify-content-end">
                                <img width="80px" height="40px" class="float-first" src="{{asset('uploads/pGgallery/'.$pGallery->feature_image)}}" alt="">
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