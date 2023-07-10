@extends('layout.app')

@section('pageTitle',trans('Update Bank'))
@section('pageSubTitle',trans('Update'))

@section('content')
<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.bank.update',encryptor('encrypt',$banklist->id))}}">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Bank Name')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('name_of_bank',$banklist->name_of_bank)}}" class="form-control" name="name_of_bank" required>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Branch Name')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('branch_name',$banklist->branch_name)}}" class="form-control" name="branch_name" required>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Account Number')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('account_number',$banklist->account_number)}}" class="form-control" name="account_number" required>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Routing Number')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('routing_number',$banklist->routing_number)}}" class="form-control" name="routing_number" required>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Account Number')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" value="{{ old('account_name',$banklist->account_name)}}" class="form-control" name="account_name" required>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="bank" ><b>{{__('Logo')}}</b></label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info me-1 mb-1">{{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection