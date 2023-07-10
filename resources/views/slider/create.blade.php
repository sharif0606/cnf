
@extends('layout.app')

@section('pageTitle',trans('Create Slide'))
@section('pageSubTitle',trans('Create'))

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.slider.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Picture">Image</label>
                                            <input type="file" id="Picture" class="form-control"
                                                placeholder="Picture" name="Picture">
                                                <span class="text-danger">(Max With/Height: 900px * 600px)</span>
                                                @if($errors->has('Picture'))
                                                    <span class="text-danger"> {{ $errors->first('Picture') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Link">link</label>
                                            <input type="text" id="Link" class="form-control" value="{{ old('Link')}}" name="Link">
                                            @if($errors->has('Link'))
                                                <span class="text-danger"> {{ $errors->first('Link') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="ShortTitle">Short Title</label>
                                            <input type="text" id="ShortTitle" class="form-control" value="{{ old('ShortTitle')}}" name="ShortTitle">
                                            @if($errors->has('ShortTitle'))
                                                <span class="text-danger"> {{ $errors->first('ShortTitle') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="LongTitle">Long Title:</label>
                                            <textarea  class="form-control" id="LongTitle"
                                                placeholder="Long Title" name="LongTitle" rows="3">{{ old('LongTitle')}}</textarea>
                                        </div>
                                    </div> --}}
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
