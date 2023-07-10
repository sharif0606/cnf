@extends('layout.app')

@section('pageTitle',trans('Update Users'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if(Session::has('response'))
                                {!!Session::get('response')['message']!!}
                            @endif
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.users.update',encryptor('encrypt',$user->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$user->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="role_id">Role</label>
                                            <select class="form-control" name="role_id" id="role_id">
                                                <option value="">Select Role</option>
                                                @forelse($roles as $r)
                                                    <option value="{{$r->id}}" {{ old('role_id',$user->role_id)==$r->id?"selected":""}}> {{ $r->type}}</option>
                                                @empty
                                                    <option value="">No Role found</option>
                                                @endforelse
                                            </select>
                                            @if($errors->has('role_id'))
                                                <span class="text-danger"> {{ $errors->first('role_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userName">Name</label>
                                            <input type="text" id="userName" class="form-control" value="{{ old('userName',$user->name)}}" name="userName">
                                            @if($errors->has('userName'))
                                                <span class="text-danger"> {{ $errors->first('userName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userEmail">Email</label>
                                            <input type="text" id="userEmail" class="form-control" value="{{ old('userEmail',$user->email)}}" name="userEmail">
                                            @if($errors->has('userEmail'))
                                                <span class="text-danger"> {{ $errors->first('userEmail') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contactNumber">Contact Number</label>
                                            <input type="text" id="contactNumber" class="form-control" value="{{ old('contactNumber',$user->contact_no)}}" name="contactNumber">
                                            @if($errors->has('contactNumber'))
                                                <span class="text-danger"> {{ $errors->first('contactNumber') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="branch_id">Branch</label>
                                            <select class="form-control" name="branch_id" id="branch_id">
                                                <option value="">Select Branch</option>
                                                @forelse($branches as $r)
                                                    <option value="{{$r->id}}" {{ old('branch_id',$user->branch_id)==$r->id?"selected":""}}> {{ $r->name}} - {{ $r->contact_no}}</option>
                                                @empty
                                                    <option value="">No Branch found</option>
                                                @endforelse
                                            </select>
                                            @if($errors->has('branch_id'))
                                                <span class="text-danger"> {{ $errors->first('branch_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" class="form-control" name="password">
                                                @if($errors->has('password'))
                                                    <span class="text-danger"> {{ $errors->first('password') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
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
