@extends('layout.app')

@section('pageTitle',trans('Update Scroll Notice'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" action="{{route(currentUser().'.scrollN.update',encryptor('encrypt',$srn->id))}}">
                              @csrf
                              @method('patch')
                              <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="text"><b>{{__('Text')}}<span class="text-danger">*</span></b></label>
                                    </div>
                                    <div class="col-12">
                                        <textarea required name="text" class="form-control" rows="3">{{ old('text',$srn->text)}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="public date"><b>{{__('Published date')}}<span class="text-danger">*</span></b></label>
                                        <input required type="date" value="{{ old('published_date',$srn->published_date)}}" class="form-control"
                                         name="published_date">
                                    </div>
                                    <div class="col-6">
                                        <label for="unpublic date"><b>{{__('Unpublished date')}}<span class="text-danger">*</span></b></label>
                                        <input required type="date" value="{{ old('unpublished_date',$srn->unpublished_date)}}" class="form-control"
                                         name="unpublished_date">
                                    </div>
                                </div>
                                  
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection

