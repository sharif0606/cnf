
@extends('layout.app')

@section('pageTitle',trans('Create Notice'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.notice.update',encryptor('encrypt',$notice->id))}}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title<span class="text-danger">*</span></label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$notice->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Details">Details:</label>
                                            <textarea  class="form-control" id="Details"
                                                placeholder="Details" name="Details" rows="3">{{ old('Details',$notice->details)}}</textarea>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="publishedDate">Published Date<span class="text-danger">*</span></label>
                                            <input type="date" id="publishedDate" class="form-control" value="{{ old('publishedDate',$notice->published_date)}}" name="publishedDate">
                                            @if($errors->has('publishedDate'))
                                                <span class="text-danger"> {{ $errors->first('publishedDate') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="unpublishedDate">Unpublished Date<span class="text-danger">*</span></label>
                                            <input type="date" id="unpublishedDate" class="form-control" value="{{ old('unpublishedDate',$notice->unpublished_date)}}" name="unpublishedDate">
                                            @if($errors->has('unpublishedDate'))
                                                <span class="text-danger"> {{ $errors->first('unpublishedDate') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Picture">Image</label>
                                            <input type="file" id="Picture" class="form-control"
                                                placeholder="Picture" name="Picture">
                                                <img width="50px" src="{{asset('uploads/notice_image/'.$notice->image)}}" alt="">
                                                @if($errors->has('Picture'))
                                                    <span class="text-danger"> {{ $errors->first('Picture') }}</span>
                                                @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="noticefile">Notice File</label>
                                            <input type="file" id="noticefile" class="form-control"
                                                placeholder="noticefile" name="noticefile">
                                                <img width="50px" src="{{asset('uploads/notice_image/'.$notice->noticefile)}}" alt="">
                                                @if($errors->has('noticefile'))
                                                    <span class="text-danger"> {{ $errors->first('noticefile') }}</span>
                                                @endif
                                        </div>
                                    </div>
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
