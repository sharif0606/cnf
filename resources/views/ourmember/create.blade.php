@extends('layout.app')

@section('pageTitle',trans('Create Member'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.ourMember.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="sl">ক্রমিক নং</label>
                                        <input type="text" class="form-control" name="form_serial_no" value="{{old('form_serial_no')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">নাম(বাংলায়)</label>
                                        <input type="text" class="form-control" name="nameBn" value="{{old('nameBn')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">নাম(ইংরেজীতে)</label>
                                        <input type="text" class="form-control" name="nameEn" value="{{old('nameEn')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">মোবাইল (নিজস্ব)</label>
                                        <input type="text" class="form-control" name="personalPhone" value="{{old('personalPhone')}}">
                                        @if($errors->has('personalPhone'))
                                            <span class="text-danger"> {{ $errors->first('personalPhone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="pass">পাসওয়ার্ড</label>
                                        <input type="password" class="form-control" name="password">
                                        @if($errors->has('password'))
                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="father">পিতার নাম</label>
                                        <input type="text" class="form-control" name="fatherName" value="{{old('fatherName')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="mother">মাতার নাম</label>
                                        <input type="text" class="form-control" name="motherName" value="{{old('motherName')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="mother">স্ত্রী </label>
                                        <input type="text" class="form-control" name="spouseName" value="{{old('spouseName')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="birth">জন্ম তারিখ</label>
                                        <input type="date" class="form-control" name="birthDate" value="{{old('birthDate')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">রক্তের গ্রুপ</label>
                                        <select name="bloodGroup" class="form-control form-select">
                                            <option value="">Selec Group</option>
                                            <option value="A+" {{ old('bloodGroup')=='A+' ? 'selected':''}}>A+</option>
                                            <option value="A-"{{ old('bloodGroup')=='A-' ? 'selected':''}}>A-</option>
                                            <option value="B+"{{ old('bloodGroup')=='B+' ? 'selected':''}}>B+</option>
                                            <option value="B-"{{ old('bloodGroup')=='B-' ? 'selected':''}}>B-</option>
                                            <option value="O+"{{ old('bloodGroup')=='O+' ? 'selected':''}}>O+</option>
                                            <option value="O-"{{ old('bloodGroup')=='O-' ? 'selected':''}}>O-</option>
                                            <option value="AB+"{{ old('bloodGroup')=='AB+' ? 'selected':''}}>AB+</option>
                                            <option value="AB-"{{ old('bloodGroup')=='AB-' ? 'selected':''}}>AB-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="nid">জাতীয় পরিচয় পত্র নং</label>
                                        <input type="text" class="form-control" name="nid" value="{{old('nid')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="wordno">বর্তমান ঠিকানাঃ ওয়ার্ড নং</label>
                                        <input type="text" class="form-control" name="wordNo" value="{{old('wordNo')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">ঠিকানা</label>
                                        <input type="text" class="form-control" name="presentAddress" value="{{old('presentAddress')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">স্থায়ী ঠিকানাঃ গ্রাম</label>
                                        <input type="text" class="form-control" name="village" value="{{old('village')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="post">ডাকঘর</label>
                                        <input type="text" class="form-control" name="postOffice" value="{{old('postOffice')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="upazila">উপজেলা</label>
                                        <input type="text" class="form-control" name="upazila" value="{{old('upazila')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="zila">জেলা</label>
                                        <input type="text" class="form-control" name="district" value="{{old('district')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">বর্তমানে কর্মরত প্রতিষ্ঠানের নাম ও ঠিকানা</label>
                                        <input type="text" class="form-control" name="nameAddress_of_present_institute" value="{{old('nameAddress_of_present_institute')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">টেলিফোন নং অফিস</label>
                                        <input type="text" class="form-control" name="officeTeliphone" value="{{old('officeTeliphone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="license">কাষ্টম সরকার লাইসেন্স নং</label>
                                        <input type="text" class="form-control" name="license" value="{{old('license')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">ইস্যুর তারিখ</label>
                                        <input type="date" class="form-control" name="issueDate" value="{{old('issueDate')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ নবায়ন)</label>
                                        <input type="date" class="form-control" name="expDate" value="{{old('expDate')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="designation">বর্তমান চাকুরী স্থলের পদবী</label>
                                        <input type="text" class="form-control" name="designation_of_present_job" value="{{old('designation_of_present_job')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">যোগদানের তারিখ</label>
                                        <input type="date" class="form-control" name="joiningDate" value="{{old('joiningDate')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">পূর্ববর্তী সর্বশেষ চাকুরীকৃত প্রতিষ্ঠানের নাম</label>
                                        <input type="text" class="form-control" name="nameOf_instituteOf_previousJob" value="{{old('nameOf_instituteOf_previousJob')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="designation">চাকুরীতে পদবী</label>
                                        <input type="text" class="form-control" name="designation_of_previous_job" value="{{old('designation_of_previous_job')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="expry">চাকুরীর মেয়াদ</label>
                                        <input type="text" class="form-control" name="jobExpiration" value="{{old('jobExpiration')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">তারিখ থেকে</label>
                                        <input type="date" class="form-control" name="formDate" value="{{old('formDate')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="img">ছবি</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="msl">সদস্য ক্রমিক নং</label>
                                        <input type="text" class="form-control" name="member_serial_no" value="{{old('member_serial_no')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">সদস্যপদ মঞ্জুরীকৃত তারিখ</label>
                                        <input type="date" class="form-control" name="approval_date" value="{{old('approval_date')}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="img">আবেদনকারীর স্বাক্ষর</label>
                                        <input type="file" class="form-control" name="applicant_signature">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group table-responsive">
                                        <label for="oarish">মনোনীত ওয়ারিশগণের নাম</label>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="bg-primary text-white">
                                                    <th class="p-2">ক্রমিক</th>
                                                    <th class="p-2">নাম</th>
                                                    <th class="p-2">সম্পর্ক</th>
                                                </tr>
                                            </thead>
                                            <tbody id="details_data">
                                                @for($i=0;$i<3;$i++ )
                                                    <tr>
                                                        <td>{{$j=$i + 1}}.</td>
                                                        <td><input type="text" id="name{{$i}}" class="form-control" name="name_of_heirs[]" placeholder="নাম"></td>
                                                        <td><input type="text" id="relation{{$i}}" class="form-control" name="relation[]" placeholder="সম্পর্ক"></td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1">Save</button>
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
