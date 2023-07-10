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
                            <p>Member Login</p>
                        </div>
                        <div class="p-4 mem-form">
                            <form class="form" method="post" action="{{route('memlogin.check')}}">
                                @csrf
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="memberId">Member ID</label>
                                        <input type="text" id="memberId" class="form-control input-bg" placeholder="Member id" onfocus="this.placeholder = ''" value="{{ old('memberId')}}" onblur="this.placeholder = 'Member id'" name="memberId">
                                    </div>
                                    @if($errors->has('memberId'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('memberId')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-12 py-2">
                                    <div class="form-group">
                                        <label for="company">password:</label>
                                        <input type="password" id="password" class="form-control input-bg" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <small class="d-block text-danger">
                                            {{$errors->first('password')}}
                                        </small>
                                    @endif
                                </div>
                                <div>
                                    <a href="">Forgot Password?</a>
                                </div>
                                <div class="col-12 py-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection