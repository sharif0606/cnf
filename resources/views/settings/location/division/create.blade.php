@extends('layout.app')

@section('pageTitle',trans('Create Division'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.division.store')}}">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country_id">Country<span class="text-danger">*</span></label>
                                            <select required class="form-control form-select" name="country_id" id="country_id">
                                                <option value="">Select Country</option>
                                                @forelse($countries as $d)
                                                    <option value="{{$d->id}}" {{ old('country_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Country found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="divisionName">Division Name<span class="text-danger">*</span></label>
                                            <input required type="text" id="divisionName" class="form-control" value="{{ old('divisionName')}}" name="divisionName">
                                            @if($errors->has('divisionName'))
                                                <span class="text-danger"> {{ $errors->first('divisionName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="divisionBn">Division Bangla</label>
                                            <input type="text" id="divisionBn" class="form-control" value="{{ old('divisionBn')}}" name="divisionBn">
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
