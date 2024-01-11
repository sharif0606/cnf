@extends('layout.app')

@section('pageTitle',trans('Update Member'))
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
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.ourMember.update',encryptor('encrypt',$member->id))}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$member->id)}}">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="sl">ক্রমিক নং</label>
                                        <input type="text" class="form-control" name="form_serial_no" value="{{old('form_serial_no',$member->form_serial)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">নাম(বাংলায়)</label>
                                        <input type="text" class="form-control" name="nameBn" value="{{old('nameBn',$member->name_bn)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">নাম(ইংরেজীতে)</label>
                                        <input type="text" class="form-control" name="nameEn" value="{{old('nameEn',$member->name_en)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">মোবাইল (নিজস্ব)</label>
                                        <input type="text" required class="form-control" name="personalPhone" value="{{old('personalPhone',$member->personal_phone)}}">
                                        @if($errors->has('personalPhone'))
                                            <span class="text-danger"> {{ $errors->first('personalPhone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="pass">পাসওয়ার্ড</label>
                                        <input type="password" class="form-control" name="password">
                                        @if($errors->has('password'))
                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>--}}
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="father">পিতার নাম</label>
                                        <input type="text" class="form-control" name="fatherName" value="{{old('fatherName',$member->father_name)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="mother">মাতার নাম</label>
                                        <input type="text" class="form-control" name="motherName" value="{{old('motherName',$member->mother_name)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="mother">স্ত্রী </label>
                                        <input type="text" class="form-control" name="spouseName" value="{{old('spouseName',$member->spouse_name)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="birth">জন্ম তারিখ</label>
                                        <input type="date" class="form-control" name="birthDate" value="{{old('birthDate',$member->birth_date)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">রক্তের গ্রুপ</label>
                                        <select name="bloodGroup" class="form-control form-select">
                                            <option value="">Select Group</option>
                                            <option value="A+" {{ old('bloodGroup',$member->blood_group)=='A+' ? 'selected':''}}>A+</option>
                                            <option value="A-"{{ old('bloodGroup',$member->blood_group)=='A-' ? 'selected':''}}>A-</option>
                                            <option value="B+"{{ old('bloodGroup',$member->blood_group)=='B+' ? 'selected':''}}>B+</option>
                                            <option value="B-"{{ old('bloodGroup',$member->blood_group)=='B-' ? 'selected':''}}>B-</option>
                                            <option value="O+"{{ old('bloodGroup',$member->blood_group)=='O+' ? 'selected':''}}>O+</option>
                                            <option value="O-"{{ old('bloodGroup',$member->blood_group)=='O-' ? 'selected':''}}>O-</option>
                                            <option value="AB+"{{ old('bloodGroup',$member->blood_group)=='AB+' ? 'selected':''}}>AB+</option>
                                            <option value="AB-"{{ old('bloodGroup',$member->blood_group)=='AB-' ? 'selected':''}}>AB-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="nid">জাতীয় পরিচয় পত্র নং</label>
                                        <input type="text" class="form-control" name="nid" value="{{old('nid',$member->nid)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="wordno">বর্তমান ঠিকানাঃ ওয়ার্ড নং</label>
                                        <input type="text" class="form-control" name="wordNo" value="{{old('wordNo',$member->word_no)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">ঠিকানা</label>
                                        <input type="text" class="form-control" name="presentAddress" value="{{old('presentAddress',$member->present_address)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">স্থায়ী ঠিকানাঃ গ্রাম</label>
                                        <input type="text" class="form-control" name="village" value="{{old('village',$member->village)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="post">ডাকঘর</label>
                                        <input type="text" class="form-control" name="postOffice" value="{{old('postOffice',$member->post_office)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="upazila">উপজেলা</label>
                                        <input type="text" class="form-control" name="upazila" value="{{old('upazila',$member->upazila)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="zila">জেলা</label>
                                        <input type="text" class="form-control" name="district" value="{{old('district',$member->district)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">প্রতিষ্ঠানের নাম</label>
                                        <input type="text" class="form-control" name="nameAddress_of_present_institute" value="{{old('nameAddress_of_present_institute',$member->nameAddress_of_present_institute)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">কর্মক্ষেত্র</label>
                                        <input type="text" class="form-control" name="place_of_work" value="{{old('place_of_work',$member->place_of_work)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">কর্মক্ষেত্র ঠিকানা</label>
                                        <input type="text" class="form-control" name="address_of_present_institute" value="{{old('address_of_present_institute',$member->address_of_present_institute)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="address">নিবন্ধন নং</label>
                                        <input type="text" class="form-control" name="registraion_no_of_present_institute" value="{{old('registraion_no_of_present_institute',$member->registraion_no_of_present_institute)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="type_of_job">চাকরির ধরন</label>
                                        <select name="type_of_job" class="form-control form-select">
                                            <option value="">Select</option>
                                            <option value="0" {{ old('type_of_job',$member->type_of_job)== '0' ? 'selected':''}}>স্থায়ী</option>
                                            <option value="1" {{ old('type_of_job',$member->type_of_job)== '1' ? 'selected':''}}>বদলি</option>
                                            <option value="2" {{ old('type_of_job',$member->type_of_job)== '2' ? 'selected':''}}>সাময়িক</option>
                                            <option value="3" {{ old('type_of_job',$member->type_of_job)== '3' ? 'selected':''}}>অস্থায়ী শিক্ষানবীশ</option>
                                            <option value="4" {{ old('type_of_job',$member->type_of_job)== '4' ? 'selected':''}}>শিক্ষাধীন</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="prottoyon">কর্মরত প্রতিষ্ঠান কর্তৃক প্রত্যয়ন পত্র</label>
                                        <select name="prottoyon" class="form-control form-select">
                                            <option value="">Select</option>
                                            <option value="0" {{ old('prottoyon',$member->prottoyon)== '0' ? 'selected':''}}>প্রযোজ্য নয়</option>
                                            <option value="1" {{ old('prottoyon',$member->prottoyon)== '1' ? 'selected':''}}>আছে</option>
                                            <option value="2" {{ old('prottoyon',$member->prottoyon)== '2' ? 'selected':''}}>নাই</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">টেলিফোন নং অফিস</label>
                                        <input type="text" class="form-control" name="officeTeliphone" value="{{old('officeTeliphone',$member->office_teliphone)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="license">কাষ্টম সরকার লাইসেন্স নং</label>
                                        <input type="text" class="form-control" name="license" value="{{old('license',$member->license)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">ইস্যুর তারিখ</label>
                                        <input type="date" class="form-control" name="issueDate" value="{{old('issueDate',$member->issue_date)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ নবায়ন)</label>
                                        <input type="date" class="form-control" name="expDate" value="{{old('expDate',$member->exp_date)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="designation">বর্তমান চাকুরী স্থলের পদবী</label>
                                        <input type="text" class="form-control" name="designation_of_present_job" value="{{old('designation_of_present_job',$member->designation_of_present_job)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">যোগদানের তারিখ</label>
                                        <input type="date" class="form-control" name="joiningDate" value="{{old('joiningDate',$member->joining_date)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">পূর্ববর্তী সর্বশেষ চাকুরীকৃত প্রতিষ্ঠানের নাম</label>
                                        <input type="text" class="form-control" name="nameOf_instituteOf_previousJob" value="{{old('nameOf_instituteOf_previousJob',$member->nameOf_instituteOf_previousJob)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="designation">চাকুরীতে পদবী</label>
                                        <input type="text" class="form-control" name="designation_of_previous_job" value="{{old('designation_of_previous_job',$member->designation_of_previous_job)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="expry">চাকুরীর মেয়াদ</label>
                                        <input type="text" class="form-control" name="jobExpiration" value="{{old('jobExpiration',$member->job_expiration)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">তারিখ থেকে</label>
                                        <input type="date" class="form-control" name="formDate" value="{{old('formDate',$member->form_date)}}">
                                    </div>
                                </div>
                               
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="msl">সদস্য ক্রমিক নং</label>
                                        <input type="text" class="form-control" name="member_serial_no" value="{{old('member_serial_no',$member->member_serial_no)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">সদস্যপদ মঞ্জুরীকৃত তারিখ</label>
                                        <input type="date" class="form-control" name="approval_date" value="{{old('approval_date',$member->approval_date)}}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="img">আবেদনকারীর স্বাক্ষর</label>
                                        <input type="file" class="form-control" name="applicant_signature">
                                    </div>
                                </div>
                                @if ($member->image != '')
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <label for="img">ছবি</label>
                                            <input type="file" class="form-control" name="image" disabled>
                                            <input type="hidden" id="base_image" name="base_image">
                                            <span class="text-danger">Image already uploaded</span>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2">
                                        <div class="form-group mt-4">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#webcammodal" disabled>
                                                Webcam
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <label for="img">ছবি</label>
                                            <input type="file" class="form-control" name="image">
                                            <input type="hidden" id="base_image" name="base_image">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2">
                                        <div class="form-group mt-4">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#webcammodal">
                                                Webcam
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">অনুমোদন</label>
                                        <select name="approvedstatus" class="form-control form-select">
                                            <option value="">অনুমোদন নির্বাচন করুন</option>
                                            @if(currentUser()=='generalsecretary')
                                            <option value="1" {{ old('approvedstatus',$member->approvedstatus)=='1' ? 'selected':''}}> অনুমোদিত</option>
                                            <option value="0"{{ old('approvedstatus',$member->approvedstatus)=='0' ? 'selected':''}}>অননুমোদিত</option>
                                            @elseif(currentUser()=='chairman')
                                            <option value="2" {{ old('approvedstatus',$member->approvedstatus)=='2' ? 'selected':''}}> অনুমোদিত</option>
                                            <option value="0" {{ old('approvedstatus',$member->approvedstatus)=='0' ? 'selected':''}}>অননুমোদিত</option>
                                            @else
                                            <option value="0"{{ old('approvedstatus',$member->approvedstatus)=='0' ? 'selected':''}}>অননুমোদিত</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="date">বর্তমান অবস্থা </label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">All</option>
                                            <option value="1" {{ old('status',$member->status)=='1' ? 'selected':''}}>Active</option>
                                            <option value="2" {{ old('status',$member->status)=='2' ? 'selected':''}}>Owner</option>
                                            <option value="3" {{ old('status',$member->status)=='3' ? 'selected':''}}>Retired</option>
                                            <option value="4" {{ old('status',$member->status)=='4' ? 'selected':''}}>Late</option>
                                            <option value="5" {{ old('status',$member->status)=='5' ? 'selected':''}}>Cancelled</option>
                                        </select>
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
                                                @if($member->heirs)
                                                @foreach($member->heirs as $c)
                                                    <tr>
                                                        <td>{{$j=$loop->index + 1}}.
                                                            <input type="hidden" name="id[]" value="{{$c->id}}">
                                                        </td>
                                                        <td><input type="text" id="name{{$loop->index}}" class="form-control" name="name_of_heirs[]" value="{{ $c->name_of_heirs }}" placeholder="নাম"></td>
                                                        <td><input type="text" id="relation{{$loop->index}}" class="form-control" name="relation[]" value="{{ $c->relation }}"  placeholder="সম্পর্ক"></td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                                
                                                @for($i=$member->heirs->count();$i<3;$i++ )
                                                <tr>
                                                    <td>{{$j=$i + 1}}.
                                                        <input type="hidden" name="id[]" value="">
                                                    </td>
                                                    <td><input type="text" id="name{{$i}}" class="form-control" name="name_of_heirs[]" placeholder="নাম"></td>
                                                    <td><input type="text" id="relation{{$i}}" class="form-control" name="relation[]" placeholder="সম্পর্ক"></td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info me-1">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="webcammodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 text-center">
                        <div id="video-container" >
                            <video width="500px" id="video" autoplay></video>
                            <button class="btn btn-primary" id="capture-btn" type="button">Capture Image</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <img width="500px" src="" alt="" id="captured-image">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="saveimage()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    function saveimage(){
        document.getElementById('base_image').value=document.getElementById('captured-image').src;
        var myModalEl = document.getElementById('webcammodal')
        var modal = bootstrap.Modal.getInstance(myModalEl) 
        modal.hide();
    }
    var myModalEl = document.getElementById('webcammodal')
    myModalEl.addEventListener('shown.bs.modal', function (event) {
        const video = document.getElementById('video');
        const captureBtn = document.getElementById('capture-btn');
        const capturedImage = document.getElementById('captured-image');

        // Access webcam
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error('Error accessing the webcam:', err);
        });

        // Capture image
        captureBtn.addEventListener('click', () => {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Draw the current frame of the video on the canvas
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert the canvas content to base64 data URL
        const imageDataURL = canvas.toDataURL('image/png');

        // Set the captured image source
        capturedImage.src = imageDataURL;
        //document.getElementById('base_image').value=imageDataURL
        });
    })
        
  </script>
@endpush