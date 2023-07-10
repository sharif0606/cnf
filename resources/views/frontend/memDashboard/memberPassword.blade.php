@extends('frontend.memDashboard.memberApp')
@section('memberContent')
        
<section class="py-0">
    <div class="row">
        <div class="col-12 member-service">
            <div class="card shadow-sm ">
                <div class="card-header mem-password">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                    <form action="{{route('member.passwordUpdate')}}" method="post">
                        @csrf
                        <div class="row p-3">
                            
                            <div class="col-lg-4 col-sm-6 col-md-12  py-1">
                                <label for="current_password" class="form-label">Current Password</label>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-md-12 py-1">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'">
                            </div>


                            <div class="col-lg-4 col-sm-6 col-md-12 py-1">
                                <label for="new_password" class="form-label">New Password</label>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-md-12 py-1">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'">
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-12 py-1">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-md-12 py-1">
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="******" onfocus="this.placeholder = ''" onblur="this.placeholder = '******'">
                            </div>

                            <div class="col-12 d-flex justify-content-end py-2">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection