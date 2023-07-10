@extends('frontend.app')
@section('content')
<!-- // Basic multiple Column Form section start -->
<section class="container py-4">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card shadow">
          <span class="shape" ></span>
              @if(Session::has('response'))
                  {!!Session::get('response')['message']!!}
              @endif
              <div class="text-center pt-4">
                <h4 style="font-weight: bold;">Want to be a member of Club</h4>
                <p>Member Registration</p>
              </div>
              <div class=" p-4 mem-form">
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('memberRegister.store')}}">
                    @csrf
                    <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                        <label for="givenName">Given Name</label>
                            <input type="text" id="givenName" class="form-control input-bg" placeholder="Your given Name" onfocus="this.placeholder = ''" value="{{ old('givenName')}}" onblur="this.placeholder = 'Your given Name'" name="givenName">
                        </div>
                        @if($errors->has('givenName'))
                            <small class="d-block text-danger">
                                {{$errors->first('givenName')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                        <label for="surname">Surname</label>
                            <input type="text" id="surname" class="form-control input-bg" placeholder="Your surname" onfocus="this.placeholder = ''" value="{{ old('surname')}}" onblur="this.placeholder = 'Your surname'" name="surname">
                        </div>
                        @if($errors->has('surname'))
                            <small class="d-block text-danger">
                                {{$errors->first('surname')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">Email Address</label>
                            <input type="email" id="EmailAddress" class="form-control input-bg" placeholder="ie: member@mail.com" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress">
                        </div>
                        @if($errors->has('EmailAddress'))
                            <small class="d-block text-danger">
                                {{$errors->first('EmailAddress')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="Mobile">Mobile Number</label>
                            <input type="text" id="PhoneNumber" class="form-control input-bg" placeholder="ie: 01****" onfocus="this.placeholder = ''" value="{{ old('PhoneNumber')}}" onblur="this.placeholder = 'ie: 01****'" name="PhoneNumber">
                        </div>
                        @if($errors->has('PhoneNumber'))
                            <small class="d-block text-danger">
                                {{$errors->first('PhoneNumber')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">password</label>
                            <input type="password" id="password" class="form-control input-bg" placeholder="ie: A-Z, a-z,digit(0-9),special character" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ie: A-Z, a-z,digit(0-9),special character'" name="password">
                        </div>
                        @if($errors->has('password'))
                            <small class="d-block text-danger">
                                {{$errors->first('password')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 py-2">
                        <div class="form-group">
                            <label for="company">Confirm password</label>
                            <input type="password" class="form-control input-bg" placeholder="Re-type your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-type your password'" name="password_confirmation">
                        </div>
                        @if($errors->has('password_confirmation'))
                            <small class="d-block text-danger">
                                {{$errors->first('password_confirmation')}}
                            </small>
                        @endif
                    </div>
                    <div class="col-12 py-2">
                        <div class="form-group">
                            <input type="checkbox" id="terms-condition" class="form-check-input" required>
                            <label>You must agree with above <a href="{{route('terms')}}">Terms & Conditions</a></label>
                        </div>
                    </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6 col-sm-12 col-md-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12 d-flex justify-content-end">
                            <span class="pt-2 me-1">If you are already registered ?</span>
                            <a class="btn btn-danger me-1 mb-1" href="{{route('memberLogin')}}">Login</a>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic multiple Column Form section end -->
    @endsection