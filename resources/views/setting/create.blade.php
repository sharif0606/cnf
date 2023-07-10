@extends('layout.app')

@section('pageTitle',trans('Create Settings'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.settings.store')}}">
                              @csrf
                                  <div class="row mb-3">
                                      <label for="contact"class="col-sm-2 offset-1 col-form-label">{{__('Contact')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('contact_no')}}" class="form-control"
                                              placeholder="contact" name="contact_no">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="email"class="col-sm-2 offset-1 col-form-label">{{__('Email')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="email" value="{{ old('email_address')}}" class="form-control"
                                              placeholder="Email" name="email_address">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="contact" class="col-sm-2 offset-1 col-form-label">{{__('Address')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <textarea name="address" class="form-control" cols="30" rows="2">{{ old('address')}}</textarea>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Facebook"class="col-sm-2 offset-1 col-form-label">{{__('Facebook Link')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('facebook_link')}}" class="form-control"
                                              name="facebook_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Twitter"class="col-sm-2 offset-1 col-form-label">{{__('Twitter Link')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('twitter_link')}}" class="form-control"
                                              name="twitter_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Youtube"class="col-sm-2 offset-1 col-form-label">{{__('Youtube Link')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('youtube_link')}}" class="form-control"
                                              name="youtube_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Linkdin"class="col-sm-2 offset-1 col-form-label">{{__('Linkdin Link')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('linkdin_link')}}" class="form-control"
                                              name="linkdin_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3 d-none">
                                      <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('We Accept')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="we_accept">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('Header Logo')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="header_logo">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('Footer Logo')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="footer_logo">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="text"class="col-sm-2 offset-1 col-form-label">{{__('Footer1 text')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('footer_top_p1_text')}}" class="form-control"
                                          name="footer_top_p1_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="text"class="col-sm-2 offset-1 col-form-label">{{__('Footer2 text')}}</label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="text" value="{{ old('footer_top_p2_text')}}" class="form-control"
                                            name="footer_top_p2_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="text"class="col-sm-2 offset-1 col-form-label">{{__('Footer3 text')}}</label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="text" value="{{ old('footer_top_p3_text')}}" class="form-control"
                                            name="footer_top_p3_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('We Accept img 1')}}</label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="file" class="form-control" name="footer_top_p1_image">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('We Accept img 2')}}</label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="file" class="form-control" name="footer_top_p2_image">
                                        </div>
                                    </div>
                                  <div class="row mb-3">
                                      <label for="image"class="col-sm-2 offset-1 col-form-label">{{__('We Accept img 3')}}</label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="footer_top_p3_image">
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