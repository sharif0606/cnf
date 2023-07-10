@extends('frontend.app')
@section('content')

<!-- // Basic multiple Column Form section start -->
<section class="container py-4">
    <div class="row merber-reg-card">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <div class="card shadow">
                <span class="shape"></span>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
              <div class="row">
                    <div class="col-lg-4 logo-side-section">
                        <div class="loginSideText h-100 ">
                            <div class="body h-100">
                                <img class="align-self-center p-3" src="{{asset('img/khlogo3.png')}}" width="140px" alt="side image" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="text-center pt-4">
                            <span><i class="bi bi-person-circle" style="font-size: 3rem; color:#815B5B"></i></span>
                            <p class="p-0 m-0">reset</p>
                            <p>Password</p>
                        </div>
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="#">
                                @csrf
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">Your Email:</label>
                                        <input type="text" id="EmailAddress" class="form-control input-bg" placeholder="ie: member@mail.com" onfocus="this.placeholder = ''" value="{{ old('EmailAddress')}}" onblur="this.placeholder = 'ie: member@mail.com'" name="EmailAddress">
                                    </div>
                                    @if($errors->has('EmailAddress'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('EmailAddress')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic multiple Column Form section end -->
@endsection