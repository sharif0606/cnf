
@extends('layout.app')

@section('pageTitle',trans('Send Sms'))
@section('pageSubTitle',trans('SMS'))

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.sms_send')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">সদস্য সিরিয়াল পুরাতন</label>
                                            <input type="number" class="form-control" name="member_id" value="{{old('member_id')}}" required>
                                            <span class="text-danger">value must be comma separated</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-info me-1 mb-1 py-0 my-0 px-4"><i class="bi bi-send" style="font-size: 2rem;"></i></button>
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
