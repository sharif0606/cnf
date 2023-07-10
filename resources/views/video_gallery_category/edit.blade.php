
@extends('layout.app')

@section('pageTitle',trans('Update Video Album'))
@section('pageSubTitle',trans('Update'))

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.vgalleryCat.update',encryptor('encrypt',$videogallery_cat->id))}}">
                                    @csrf
                                    @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Album Name:</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name',$videogallery_cat->name)}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="year">{{__('Video Year')}}<span class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="year" id="year" required>
                                                <option value="">Select Video year</option>
                                                @forelse($year as $d)
                                                    <option value="{{$d->id}}" {{ old('year',$videogallery_cat->year_id)==$d->id?"selected":""}}> {{ $d->year}}</option>
                                                @empty
                                                    <option value="">No Data found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="FeatureImage">Feature Image</label>
                                            <input type="file" id="FeatureImage" class="form-control"
                                                placeholder="FeatureImage" name="FeatureImage">
                                                <img width="50px" src="{{asset('uploads/vgallerycat_image/'.$videogallery_cat->feature_img)}}" alt="">
                                                @if($errors->has('FeatureImage'))
                                                    <span class="text-danger"> {{ $errors->first('FeatureImage') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <fieldset class="col-md-6 col-12">
                                        <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                                        <div class="col-sm-10">
                                          <input type="radio" value="1" {{$videogallery_cat->status == '1' ? 'checked' : ''}} name="status"> Active
                                          &nbsp;
                                          <input type="radio" value="0" {{$videogallery_cat->status == '0' ? 'checked' : ''}} name="status"> Inactive
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

