@php $setting=\App\Models\setting::first(); @endphp
@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Contact Us</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-item router-link-active">Contact US</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="card shadow" id="contact_us">
          <span class="shape" ></span>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif 
                    
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
              <div class=" px-4 pt-3 pb-0">
                <h4 style="font-weight: bold;">Contact Us</h4>
                <p>“Got a Question? We'd love to hear from you. Send us a message and we'll respond as soon as possible”</p>
              </div>
              <div class=" px-4 pt-0 pb-2 mem-form">
                <form class="form" method="GET" enctype="multipart/form-data" action="{{route('contact.us')}}">
                    @csrf
                    <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-bg" placeholder="Your Name" onfocus="this.placeholder = ''" value="{{ old('name')}}" onblur="this.placeholder = 'Your Name'" name="name">
                        </div>
                        @if($errors->has('name'))
                            <small class="d-block text-danger">
                                {{$errors->first('name')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-bg" placeholder="ie: member@mail.com" onfocus="this.placeholder = ''" value="{{ old('email')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="email">
                        </div>
                        @if($errors->has('email'))
                            <small class="d-block text-danger">
                                {{$errors->first('email')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="Mobile">Phone Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-bg" placeholder="ie: 01****" onfocus="this.placeholder = ''" value="{{ old('PhoneNumber')}}" onblur="this.placeholder = 'ie: 01****'" name="PhoneNumber">
                        </div>
                        @if($errors->has('PhoneNumber'))
                            <small class="d-block text-danger">
                                {{$errors->first('PhoneNumber')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="lookingfor">Looking for<span class="text-danger">*</span></label>
                            <select required name="lookingfor" class="form-control form-select input-bg">
                                <option value="">Select</option>
                                @forelse($contactReason as $d)
                                    <option value="{{$d->id}}" {{ old('lookingfor')==$d->id?"selected":""}}> {{ $d->reason}}</option>
                                @empty
                                    <option value="">No Data found</option>
                                @endforelse
                            </select>
                            @if($errors->has('lookingfor'))
                            <small class="d-block text-danger">
                                {{$errors->first('lookingfor')}}
                            </small>
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control input-bg" name="message" rows="2">{{ old('message')}}</textarea>
                            
                        </div>
                    </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="contact ps-3 mt-4">
                <h3>Visit our office at</h3>
                <span class="contact-border">
                    <i class="bi bi-geo-alt-fill"></i>
                  <p>
                    {{ $setting?->address }}
                  </p>
                </span>
                <h4>Contact Us</h4>
                <div class="contact-border">
                    <span>
                        <i class="bi bi-telephone-fill"></i>
                        <p>{{ $setting?->contact_no }}</p>
                    </span>
                    <span>
                        <i class="bi bi-envelope-fill"></i>
                        <p>{{ $setting?->email_address }}</p>
                    </span>
                </div>
                <h4 class="mt-4 mb-2">Connect With Us</h4>
                <div class=" social-icon">
                    <a href="{{ $setting?->facebook_link }}"><i class="bi bi-facebook ms-0 ps-0"></i></a>
                    <a href="{{ $setting?->twitter_link }}"><i class="bi bi-twitter ms-0 ps-0"></i></a>
                    <a href="{{ $setting?->linkdin_link }}"><i class="bi bi-linkedin ms-0 ps-0"></i></a>
                    <a href="{{ $setting?->youtube_link }}"><i class="bi bi-youtube ms-0 ps-0"></i></a>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12 pt-5">
            <iframe class="container-fluid footer-ifram"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14763.086755567325!2d91.80151863306914!3d22.32447277470316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8caa5739671%3A0xb923ad5eba0512c6!2sC%20%26%20F%20Tower%2C%201222%20Sheikh%20Mujib%20Rd%2C%20Chittagong%204100!5e0!3m2!1sen!2sbd!4v1689223359684!5m2!1sen!2sbd"
                width="700" height="293" style="border: 0; padding:0px" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection