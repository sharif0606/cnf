@extends('layout.app')

@section('pageTitle',trans('Update Year'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.year.update',encryptor('encrypt',$year->id))}}">
                              @csrf
                              @method('patch')
                              <div class="row mb-3">
                                <div class="col-sm-8 offset-2">
                                    <label for="year" class=""><b>{{__('Year')}}:</b></label>
                                    <select id="year" name="year" class="form-control ">
                                    {{ $last= date('Y')-120 }}
                                    {{ $now = date('Y') }}

                                    @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}" {{ old('year', $year->year) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                    </select>
                                </div>
                                <div class="col-sm-8 offset-2 my-2">
                                    <label for="image" class=""><b>{{__('Feature img for photo')}}:</b></label>
                                    <input type="file" id="feature_photo" class="form-control" name="feature_photo">
                                </div>

                                <div class="col-sm-8 offset-2 my-2">
                                    <label for="image" class=""><b>{{__('Feature img for video')}}:</b></label>
                                    <input type="file" id="feature_video" class="form-control" name="feature_video">
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