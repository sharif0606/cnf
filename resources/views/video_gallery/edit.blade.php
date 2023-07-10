
@extends('layout.app')

@section('pageTitle',trans('Create Video Gallery Caption'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.vgallery.update',encryptor('encrypt',$videogallery->id))}}">
                                @csrf
                                @method('PATCH')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="caption">Caption:</label>
                                        <input type="text" id="caption" class="form-control" value="{{ old('caption',$videogallery->caption)}}" name="caption">
                                        @if($errors->has('caption'))
                                            <span class="text-danger"> {{ $errors->first('caption') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="link">Video Link</label>
                                        <input type="text" name="link" class="form-control" value="{{ old('link',$videogallery->link)}}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="videoId">{{__('Album')}}<span class="text-danger">*</span></label>
                                        <select class="form-control form-select" name="album" id="album">
                                            <option value="">Select Album</option>
                                            @forelse($vGalleryCat as $d)
                                                <option value="{{$d->id}}" {{ old('album',$videogallery->video_gallary_category_id)==$d->id?"selected":""}}> {{ $d->name}}</option>
                                            @empty
                                                <option value="">No Data found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <fieldset class="col-md-6 col-12">
                                    <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                                    <div class="col-sm-10">
                                        <input type="radio" value="1" {{$videogallery->status == '1' ? 'checked' : ''}} name="status"> Active
                                        &nbsp;
                                        <input type="radio" value="0" {{$videogallery->status == '0' ? 'checked' : ''}} name="status"> Inactive
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

