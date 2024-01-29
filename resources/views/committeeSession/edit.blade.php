@extends('layout.app')

@section('pageTitle',trans('Update Committee Session'))
@section('pageSubTitle',trans('update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.committeeSession.update',encryptor('encrypt',$comSession->id))}}">
                              @csrf
                              @method('patch')
                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="session"><b>{{__('Start Year')}}<span class="text-danger">*</span></b></label>
                                            <select id="startYear" name="start_year" class="form-control" required>
                                                <option value="">Select Year</option>
                                                @for($i=2021; $i<= date('Y') + 10; $i++)
                                                    <option value="{{$i}}" {{ old('start_year',$comSession->start_year)== $i ? 'selected':''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="session"><b>{{__('End Year')}}<span class="text-danger">*</span></b></label>
                                            <select id="endYear" name="end_year" class="form-control" required>
                                                <option value="">Select Year</option>
                                                @for($i=2021; $i<= date('Y') + 10; $i++)
                                                    <option value="{{$i}}" {{ old('end_year',$comSession->end_year)== $i ? 'selected':''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="session"><b>{{__('Name')}}<span class="text-danger">*</span></b></label>
                                            <input type="text" value="{{ old('session',$comSession->session_name)}}" class="form-control" name="session" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info me-1 mb-1">Update</button>
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