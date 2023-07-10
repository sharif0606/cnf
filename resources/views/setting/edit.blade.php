@extends('layout.app')

@section('pageTitle',trans('Update Settings'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.settings.update',encryptor('encrypt',$settings->id))}}">
                              @csrf
                              @method('patch')
                                  <div class="row mb-3">
                                      <label for="contact" class="col-sm-2 offset-1 col-form-label"><b>{{__('Contact')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('contact_no',$settings->contact_no)}}" class="form-control"
                                              placeholder="contact" name="contact_no">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="email" class="col-sm-2 offset-1 col-form-label"><b>{{__('Email')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="email" value="{{ old('email_address',$settings->email_address)}}" class="form-control"
                                              placeholder="Email" name="email_address">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="contact" class="col-sm-2 offset-1 col-form-label"><b>{{__('Address')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <textarea name="address" class="form-control" cols="30" rows="2">{{ old('address',$settings->address)}}</textarea>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Facebook" class="col-sm-2 offset-1 col-form-label"><b>{{__('Facebook Link')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('facebook_link',$settings->facebook_link)}}" class="form-control"
                                              name="facebook_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Twitter" class="col-sm-2 offset-1 col-form-label"><b>{{__('Twitter Link')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('twitter_link',$settings->twitter_link)}}" class="form-control"
                                              name="twitter_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Youtube" class="col-sm-2 offset-1 col-form-label"><b>{{__('Youtube Link')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('youtube_link',$settings->youtube_link)}}" class="form-control"
                                              name="youtube_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="Linkdin" class="col-sm-2 offset-1 col-form-label"><b>{{__('Linkdin Link')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('linkdin_link',$settings->linkdin_link)}}" class="form-control"
                                              name="linkdin_link">
                                      </div>
                                  </div>
                                  <div class="row mb-3 d-none">
                                      <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('We Accept')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="we_accept">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Header Logo')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="header_logo">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Footer Logo')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="footer_logo">
                                      </div>
                                  </div>
                                    <div class="row mb-3">
                                      <label for="text" class="col-sm-2 offset-1 col-form-label"><b>{{__('Footer1 text')}}:</b></label>
                                        <div class="col-sm-6 offset-1">
                                          <input type="text" value="{{ old('footer_top_p1_text',$settings->footer_top_p1_text)}}" class="form-control"
                                          name="footer_top_p1_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="text" class="col-sm-2 offset-1 col-form-label"><b>{{__('Footer2 text')}}:</b></label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="text" value="{{ old('footer_top_p2_text',$settings->footer_top_p2_text)}}" class="form-control"
                                            name="footer_top_p2_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="text" class="col-sm-2 offset-1 col-form-label"><b>{{__('Footer3 text')}}:</b></label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="text" value="{{ old('footer_top_p3_text',$settings->footer_top_p3_text)}}" class="form-control"
                                            name="footer_top_p3_text">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('We Accept img 1')}}:</b></label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="file" class="form-control" name="footer_top_p1_image">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('We Accept img 2')}}:</b></label>
                                        <div class="col-sm-6 offset-1">
                                            <input type="file" class="form-control" name="footer_top_p2_image">
                                        </div>
                                    </div>
                                  <div class="row mb-3">
                                      <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('We Accept img 3')}}:</b></label>
                                      <div class="col-sm-6 offset-1">
                                          <input type="file" class="form-control" name="footer_top_p3_image">
                                      </div>
                                  </div>
                                  
                                  <div class="col-8 offset-2 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1"><b>{{__('Save')}}</b></button>
                                      
                                  </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection