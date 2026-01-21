@extends('layout.app')
@section('pageTitle', trans('Archive Member List'))
@section('pageSubTitle', trans('List'))

@section('content')

    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif
                    <div class="row pb-1">
                        <div class="col-12">
                            {{-- <a href="{{route(currentUser().'.member_contact')}}">download</a> --}}
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="member_serial_no"
                                                value="{{isset($_GET['member_serial_no']) ? $_GET['member_serial_no'] : ''}}"
                                                placeholder="Member ID Old" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="member_serial_no_new"
                                                value="{{isset($_GET['member_serial_no_new']) ? $_GET['member_serial_no_new'] : ''}}"
                                                placeholder="Member ID New" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="name_bn"
                                                value="{{isset($_GET['name_bn']) ? $_GET['name_bn'] : ''}}"
                                                placeholder="Member Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="renew_serial_no"
                                                value="{{isset($_GET['renew_serial_no']) ? $_GET['renew_serial_no'] : ''}}"
                                                placeholder="RS NO" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="district"
                                                value="{{isset($_GET['district']) ? $_GET['district'] : ''}}"
                                                placeholder="জেলা" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="nameAddress_of_present_institute"
                                                value="{{isset($_GET['nameAddress_of_present_institute']) ? $_GET['nameAddress_of_present_institute'] : ''}}"
                                                placeholder="বর্তমান চাকুরী" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="nameOf_instituteOf_previousJob"
                                                value="{{isset($_GET['nameOf_instituteOf_previousJob']) ? $_GET['nameOf_instituteOf_previousJob'] : ''}}"
                                                placeholder="পূর্ববর্তী চাকুরী" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="year"
                                                value="{{isset($_GET['year']) ? $_GET['year'] : ''}}"
                                                placeholder="payment year" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="payStatus" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1" @if(isset($_GET['payStatus']) && $_GET['payStatus'] == 1)
                                                selected @endif>Paid</option>
                                                <option value="2" @if(isset($_GET['payStatus']) && $_GET['payStatus'] == 2)
                                                selected @endif>Unpaid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="blood" id="" class="form-control">
                                                <option value="">Blood Group All</option>
                                                <option value="A+" @if(isset($_GET['blood']) && $_GET['blood'] == 'A+')
                                                selected @endif>A+</option>
                                                <option value="A-" @if(isset($_GET['blood']) && $_GET['blood'] == 'A-')
                                                selected @endif>A-</option>
                                                <option value="B+" @if(isset($_GET['blood']) && $_GET['blood'] == 'B+')
                                                selected @endif>B+</option>
                                                <option value="B-" @if(isset($_GET['blood']) && $_GET['blood'] == 'B-')
                                                selected @endif>B-</option>
                                                <option value="O+" @if(isset($_GET['blood']) && $_GET['blood'] == 'O+')
                                                selected @endif>O+</option>
                                                <option value="O-" @if(isset($_GET['blood']) && $_GET['blood'] == 'O-')
                                                selected @endif>O-</option>
                                                <option value="AB+" @if(isset($_GET['blood']) && $_GET['blood'] == 'AB+')
                                                selected @endif>AB+</option>
                                                <option value="AB-" @if(isset($_GET['blood']) && $_GET['blood'] == 'AB-')
                                                selected @endif>AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="status" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="1" @if(isset($_GET['status']) && $_GET['status'] == 1) selected
                                                @endif>Active</option>
                                                <option value="2" @if(isset($_GET['status']) && $_GET['status'] == 2) selected
                                                @endif>Owner</option>
                                                <option value="3" @if(isset($_GET['status']) && $_GET['status'] == 3) selected
                                                @endif>Retired</option>
                                                <option value="4" @if(isset($_GET['status']) && $_GET['status'] == 4) selected
                                                @endif>Late</option>
                                                <option value="5" @if(isset($_GET['status']) && $_GET['status'] == 5) selected
                                                @endif>Cancelled</option>
                                                <option value="0" @if(isset($_GET['status']) && $_GET['status'] == 0) selected
                                                @endif>Not Contacted</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="remove_printed_card" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="1">Already Printed</option>
                                                <option value="2">Not Printed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-info" type="submit">Search</button>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{route(currentUser() . '.archive_member')}}">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div class="col-12">
                            <textarea name="member_id" id="member_id" class="form-control" rows="3"></textarea>
                            <button class="btn btn-sm btn-primary" onclick="print_card()">Print</button>
                        </div>
                    </div>
                    {{-- <div>
                        <a class="float-end" href="{{route(currentUser().'.ourMember.create')}}" style="font-size:1.7rem"><i
                                class="bi bi-plus-square-fill"></i></a>
                    </div> --}}
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('ক্রমিক নং')}}</th>
                                    <th scope="col">{{__('নাম')}}</th>
                                    <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
                                    <th scope="col">{{__('পিতার নাম')}}</th>
                                    <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
                                    <th scope="col">{{__('রক্তের গ্রুপ')}}</th>
                                    <th scope="col">{{__('এনআইডি')}}</th>
                                    <th scope="col">{{__('চাকুরীর পদবি')}}</th>
                                    <th class="white-space-nowrap">{{__('') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ourmember as $key => $p)
                                    <tr>
                                        <th scope="row">

                                            <input onclick="add_member_id({{$p->id}})" type="checkbox" name="member_id[]"
                                                value="{{$p->id}}">
                                            {{$key}}
                                        </th>
                                        <td>{{$p->name_bn}}</td>
                                        <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
                                        <td>{{$p->father_name}}</td>
                                        <td>{{$p->personal_phone}}</td>
                                        <td>{{$p->blood_group}}</td>
                                        <td>{{$p->nid}}</td>
                                        <td>{{$p->designation_of_present_job}}</td>
                                        <td class="white-space-nowrap">

                                            <a class="text-primary"
                                                href="{{route(currentUser() . '.idcard_print', encryptor('encrypt', $p->id))}}"
                                                target="_blank" title="Print Member Card">
                                                <i class="bi bi-card-heading"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="8" class="text-center">No Data Found</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="full_page"></div>
    <div id="my-content-div" class="d-none"></div>
@endsection
@push('scripts')

    <script>
        function print_card() {
            var member_id = $("#member_id").val();
            window.open("{{route(currentUser() . '.idcard_print')}}?member_id=" + member_id, '_blank');
        }

        function add_member_id(id) {
            var member_id = $("#member_id").val();
            if (member_id.includes(id)) {
                $("#member_id").val(member_id.replace(',' + id, ''));
            } else {
                $("#member_id").val(member_id + ',' + id);
            }
        }

    </script>

@endpush