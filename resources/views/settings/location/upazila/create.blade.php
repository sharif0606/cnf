@extends('layout.app')

@section('pageTitle',trans('Create Upazila'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.upazila.store')}}">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="district_id">District<span class="text-danger">*</span></label>
                                            <select required class="form-control form-select" name="district_id" id="district_id">
                                                <option value="">Select District</option>
                                                @forelse($districts as $d)
                                                    <option value="{{$d->id}}" {{ old('district_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="upazilaName">Upazila Name<span class="text-danger">*</span></label>
                                            <input required type="text" id="upazilaName" class="form-control" value="{{ old('upazilaName')}}" name="upazilaName">
                                            @if($errors->has('upazilaName'))
                                                <span class="text-danger"> {{ $errors->first('upazilaName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="upazilaBn">Upazila Bangla</label>
                                            <input type="text" id="upazilaBn" class="form-control" value="{{ old('upazilaBn')}}" name="upazilaBn">
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
