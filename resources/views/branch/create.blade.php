  @extends('layout.app')

  @section('pageTitle','Create Branch')
@section('pageSubTitle','Create')

  @section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.branch.store')}}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Branch</label>
                                            <input type="text" id="name" value="{{ old('name')}}" class="form-control"
                                                placeholder="Branch Name" name="name">
                                        </div>
                                        @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="text" id="contact" value="{{ old('contact')}}" class="form-control"
                                                placeholder="Branch contact" name="contact">
                                        </div>
                                        @if($errors->has('contact'))
                                        <span class="text-danger"> {{ $errors->first('contact') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="binNumber">Bin Number</label>
                                            <input type="text" id="binNumber" value="{{ old('binNumber')}}" class="form-control"
                                                placeholder="Branch Bin Number" name="binNumber">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tradeNumber">Trade Number</label>
                                            <input type="text" id="binNumber" value="{{ old('tradeNumber')}}" class="form-control"
                                                placeholder="Branch Trade Number" name="tradeNumber">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Address</label>
                                           <textarea class="form-control" name="address" id="address" rows="2">{{ old('address')}}</textarea>
                                        </div>
                                       
                                    </div>

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