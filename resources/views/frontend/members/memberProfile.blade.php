@extends('frontend.members.memberApp')
@section('memberContent')
<div class="regi-form tab-pane">
    <div class="member-service">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 ">
                <div class="card regi-form shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Update Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('profile.update')}}">
                            @csrf
                            @method('POST')
                            <div class="steps progress-tabmenu d-flex flex-column">
                                <ul class="nav nav-pills mt-3 mb-5" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link step-1-tab active" id="step-1-tab" data-toggle="pill" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true"><span>1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-2-tab" id="step-2-tab" data-toggle="pill" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false"><span>2</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-3-tab" id="step-3-tab" data-toggle="pill" href="#step-3" role="tab" aria-controls="step-3" aria-selected="false"><span>3</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-4-tab" id="step-4-tab" data-toggle="pill" href="#step-4" role="tab" aria-controls="step-4" aria-selected="false"><span>4</span></a>
                                    </li>
                                </ul>
                                <div class="text-end">
                                    <button type="button" class="btn btn-sm btn-info text-white">Save as Draft</button>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                                        <!-- Step 1 -->
                                        <div class="row mt-4">
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="givenName">Given Name</label>
                                                    <input type="text" id="givenName" class="form-control" value="{{ old('given_name',$member->given_name)}}" name="given_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" class="form-control" value="{{ old('surname',$member->surname)}}" name="surname">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="Fathers">Father's Name:</label>
                                                    <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers',$member->father_name)}}" name="Fathers">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="husbanName">Husband's Name:</label>
                                                    <input type="text" id="husbanName" class="form-control" value="{{ old('husbanName',$member->husban_name)}}" name="husbanName">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="mothersName">Mother's Name:</label>
                                                    <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName',$member->mother_name)}}" name="mothersName">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Nominee:</label>
                                                    <input type="text" id="nominee" class="form-control" value="{{ old('nominee',$member->nominee)}}" name="nominee">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="dateOfBirth">Date and Place of Birth:</label>
                                                    <input type="date" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth',$member->birth_date)}}" name="dateOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Photo:</label>
                                                    <input type="file" id="image" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="orderby">Order By:</label>
                                                    <select class="form-control form-select" name="order_b" id="order_b">
                                                        <option value="">Select Order By</option>
                                                        <option value="1" {{ old('order_b',$member->order_b)=='1' ? 'selected':''}}>Yes</option>
                                                        <option value="0" {{ old('order_b',$member->order_b)=='0' ? 'selected':''}}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="facebook">Facebook link:</label>
                                                    <input type="text" id="fb_link" class="form-control" value="{{ old('nationality',$member->fb_link)}}" name="fb_link">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="twitter">Twitter link:</label>
                                                    <input type="text" id="twter_link" class="form-control" value="{{ old('nationality',$member->twter_link)}}" name="twter_link">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="linkedin">Linkedin link:</label>
                                                    <input type="text" id="linkdin_link" class="form-control" value="{{ old('nationality',$member->linkdin_link)}}" name="linkdin_link">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="youtube">Youtube link:</label>
                                                    <input type="text" id="youtube_link" class="form-control" value="{{ old('nationality',$member->youtube_link)}}" name="youtube_link">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nationality">Nationality:</label>
                                                    <input type="text" id="nationality" class="form-control" value="{{ old('nationality',$member->nationality)}}" name="nationality">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="profession">Profession:</label>
                                                    <input type="text" id="profession" class="form-control" value="{{ old('profession',$member->profession)}}" name="profession">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="company">Company Name:</label>
                                                    <input type="text" id="company" class="form-control" value="{{ old('profession',$member->company)}}" name="company">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Comapny Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('designation',$member->designation)}}" name="designation">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" id="description"  rows="2">{{old('description',$member->description)}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="attach_pdf">PDF Profile:</label>
                                                    <input type="file" id="attach_pdf" class="form-control" name="attach_pdf">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="cellno">Cell No:</label>
                                                    <input type="text" id="cellno" class="form-control" value="{{ old('cellno',$member->cell_number)}}" name="cellno">
                                                        @if($errors->has('cellno'))
                                                            <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-danger next-step">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                                        <!-- Step 2 -->
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tel">Tel:</label>
                                                    <input type="text" id="tel" class="form-control" value="{{ old('tel',$member->tel_number)}}" name="tel">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="fax">Fax:</label>
                                                    <input type="text" id="fax" class="form-control" value="{{ old('fax',$member->fax_number)}}" name="fax">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="email">E-mail:</label>
                                                    <input type="email" id="email" class="form-control" value="{{ old('email',$member->email)}}" name="email">
                                                        @if($errors->has('email'))
                                                            <span class="text-danger"> {{ $errors->first('email') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="bloodGroup">Blood Group:</label>
                                                        <select class="form-control form-select" name="bloodGroup" id="blood">
                                                            <option value="">Select Blood Group</option>
                                                            <option value="A+" {{ old('patientBlood',$member->blood_group)=='A+' ? 'selected':''}}>A+</option>
                                                            <option value="A-"{{ old('patientBlood',$member->blood_group)=='A-' ? 'selected':''}}>A-</option>
                                                            <option value="B+"{{ old('patientBlood',$member->blood_group)=='B+' ? 'selected':''}}>B+</option>
                                                            <option value="B-"{{ old('patientBlood',$member->blood_group)=='B-' ? 'selected':''}}>B-</option>
                                                            <option value="O+"{{ old('patientBlood',$member->blood_group)=='O+' ? 'selected':''}}>O+</option>
                                                            <option value="O-"{{ old('patientBlood',$member->blood_group)=='O-' ? 'selected':''}}>O-</option>
                                                            <option value="AB+"{{ old('patientBlood',$member->blood_group)=='AB+' ? 'selected':''}}>AB+</option>
                                                            <option value="AB-"{{ old('patientBlood',$member->blood_group)=='AB-' ? 'selected':''}}>AB-</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <select  class="form-control form-select" name="credit">
                                                        <option value="">National ID No</option>
                                                        <option value="">Passport No</option>
                                                        <option value="">Driving License No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="text" id="nationalid" class="form-control" value="{{ old('nationalid',$member->national_id)}}" name="nationalid">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="qualification">Educational Qualification:</label>
                                                    <input type="text" id="qualification" class="form-control" value="{{ old('qualification',$member->qualification)}}" name="qualification">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="qualification"><h5>Parmanent Address</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">Village</label>
                                                    <input type="text" id="vill" class="form-control" value="{{ old('vill',$member->village)}}" name="vill">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">P.O:</label>
                                                    <input type="text" id="postoffice" class="form-control" value="{{ old('postoffice',$member->postoffice)}}" name="postoffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="upazila">P.S/UP:</label>
                                                    <input type="text" id="upazila" class="form-control" value="{{ old('upazila',$member->upazila)}}" name="upazila">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">Dist:</label>
                                                    <input type="text" id="district" class="form-control" value="{{ old('district',$member->district)}}" name="district">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="presentAddress">Present/Mailing Residential Address</label>
                                                    <input type="text" id="presentAddress" class="form-control" value="{{ old('presentAddress',$member->present_address)}}" name="presentAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="officeAddress">Office Address:</label>
                                                    <input type="text" id="officeAddress" class="form-control" value="{{ old('officeAddress',$member->office_address)}}" name="officeAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <h5>Details Of Other Club Membership(IF Any):</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="othersdate">Date:</label>
                                                    <input type="date" id="othersdate" class="form-control" value="{{ old('othersdate',$member->others_date)}}" name="othersdate">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="signatureApplicant">Signature Of Applicant:</label>
                                                    <input type="file" id="signatureApplicant" class="form-control" value="{{ old('signatureApplicant',$member->signature_applicant)}}" name="signatureApplicant">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="identifyPresident">Identified by President/Vice President:</label>
                                                    <input type="text" id="identifyPresident" class="form-control" value="{{ old('identifyPresident',$member->identify_president)}}" name="identifyPresident">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="memberNo">Member No:</label>
                                                    <input type="text" id="memberNo" class="form-control" value="{{ old('memberNo',$member->member_no)}}" name="memberNo">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                                        <!-- Step 3 -->
                                        <div class="row">
                                            
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="mrormis">Mr./Mis.:</label>
                                                    <input type="text" id="mrormis" class="form-control" value="{{ old('mrormis',$member->mr_mis)}}" name="mrormis">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="otheraddress">Address:</label>
                                                    <input type="text" id="otheraddress" class="form-control" value="{{ old('otheraddress',$member->other_address)}}" name="otheraddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="signaturefounderpresident">Signature Of Founder President:</label>
                                                    <input type="file" id="signaturefounderpresident" class="form-control" value="{{ old('signaturefounderpresident',$member->signature_founder_president)}}" name="signaturefounderpresident">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="foundervicepresident">Signature Of Founder Vice President:</label>
                                                    <input type="file" id="foundervicepresident" class="form-control" value="{{ old('foundervicepresident',$member->signature_founder_vicepresident)}}" name="foundervicepresident">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="remarks">Remarks:</label>
                                                    <textarea  class="form-control" id="remarks"
                                                    placeholder="remarks" name="remarks" rows="3">{{ old('remarks',$member->remarks)}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="updateincometax">Updated Income Tax Paid With TIN/GIR No:</label>
                                                    <input type="text" id="updateincometax" class="form-control" value="{{ old('updateincometax',$member->update_incometax)}}" name="updateincometax">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <h5>Details of Passport</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="passportnotype">1)Passport No and Type:</label>
                                                    <input type="text" id="passportnotype" class="form-control" value="{{ old('passportnotype',$member->passport_notype)}}" name="passportnotype">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="pdateissue">2)Place and Date of Issue:</label>
                                                    <input type="text" id="pdateissue" class="form-control" value="{{ old('pdateissue',$member->pdate_issue)}}" name="pdateissue">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="issuingAuthority">3)Issuing Authority:</label>
                                                    <input type="text" id="issuingAuthority" class="form-control" value="{{ old('issuingAuthority',$member->issuing_authority)}}" name="issuingAuthority">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="validity">4)Validity:</label>
                                                    <input type="text" id="validity" class="form-control" value="{{ old('validity',$member->validity)}}" name="validity">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <h5>Family Details</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="namespouse">1)Name of Spouse:</label>
                                                    <input type="text" id="namespouse" class="form-control" value="{{ old('namespouse',$member->name_spouse)}}" name="namespouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="occupationSpouse">2)Occupation of Spouse:</label>
                                                    <input type="text" id="occupationSpouse" class="form-control" value="{{ old('occupation_spouse',$member->occupation_spouse)}}" name="occupationSpouse">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-4" role="tabpanel" aria-labelledby="step-4-tab">
                                        <!-- Step 4 -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3">Details of Children:(Must be Added with Birth Certificate copy):</label>
                                                    <table class="table table-striped mb-5">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Sex</th>
                                                                <th scope="col">Date of Birth</th>
                                                                <th scope="col">Occupation With Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @if($member->children)
                                                            @foreach($member->children as $c)
                                                                <tr class="text-center">
                                                                    <td>{{$j=$loop->index + 1}}.
                                                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                                                    </td>
                                                                    <td><input type="text" id="Name{{$loop->index}}" class="form-control" name="cname[]" value="{{ $c->name }}" placeholder=" Enter Name"></td>
                                                                    <td><input type="radio" id="male{{$loop->index}}" name="cgender[{{$loop->index}}]" value="1" {{ old('cgender',$c->gender)=="1" ? "checked":"" }}> <label for="male{{$loop->index}}">Male</label>
                                                                        <input type="radio" id="female{{$loop->index}}" name="cgender[{{$loop->index}}]" value="2" {{ old('cgender',$c->gender)=="2" ? "checked":"" }}> <label for="female{{$loop->index}}">Female</label></td>
                                                                    <td><input type="date" id="birth_date{{$loop->index}}" class="form-control" name="cbirth_date[]" value="{{ $c->birth_date }}" placeholder="Date of Birth"></td>
                                                                    <td><input type="text" id="occupation{{$loop->index}}" class="form-control" name="coccupation[]" value="{{ $c->occupation }}"  placeholder="Occupation"></td>
                                                                </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            @for($i=$member->children->count();$i<5;$i++ )
                                                            <tr class="text-center">
                                                                <td>{{$j=$i + 1}}.
                                                                    <input type="hidden" name="id[]" value="">
                                                                </td>
                                                                <td><input type="text" id="Name{{$i}}" class="form-control" name="cname[]" placeholder=" Enter Name"></td>
                                                                <td><input type="radio" id="male{{$i}}" name="cgender[{{$i}}]" value="1" {{ old('cgender')=="1" ? "checked":"" }}> <label for="male{{$i}}">Male</label>
                                                                    <input type="radio" id="female{{$i}}" name="cgender[{{$i}}]" value="2" {{ old('cgender')=="2" ? "checked":"" }}> <label for="female{{$i}}">Female</label></td>
                                                                <td><input type="date" id="birth_date{{$i}}" class="form-control" name="cbirth_date[]" placeholder="Date of Birth"></td>
                                                                <td><input type="text" id="occupation{{$i}}" class="form-control" name="coccupation[]" placeholder="Occupation"></td>
                                                            </tr>
                                                            @endfor

                                                        </tbody>
                                                    </table>
                                                    {{-- <input type="text" id="detailschildresns" class="form-control" name="detailschildresns">
                                                        @if($errors->has('detailschildresns'))
                                                            <span class="text-danger"> {{ $errors->first('detailschildresns') }}</span>
                                                        @endif --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="categorymembership" class="mt-3">Category of Membership Applied for(Please Tick Mark One Box):</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="donermember" name="categorymembership" value="1" {{ old('categorymembership',$member->membership_applied)=="1" ? "checked":"" }}>
                                                    <label for="donermember">Donor Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="servicemember" name="categorymembership" value="2" {{ old('categorymembership',$member->membership_applied)=="2" ? "checked":"" }}>
                                                    <label for="servicemember">Service Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="lifemember" name="categorymembership" value="3" {{ old('categorymembership',$member->membership_applied)=="3" ? "checked":"" }}>
                                                    <label for="lifemember">Life Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="temporarymember" name="categorymembership" value="4" {{ old('categorymembership',$member->membership_applied)=="4" ? "checked":"" }}>
                                                    <label for="temporarymember">Temporary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="permanentmember" name="categorymembership" value="5" {{ old('categorymembership',$member->membership_applied)=="5" ? "checked":"" }}>
                                                    <label for="permanentmember">Permanent Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="honorarymember" name="categorymembership" value="6" {{ old('categorymembership',$member->membership_applied)=="6" ? "checked":"" }}>
                                                    <label for="honorarymember">Honorary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="cprporatemember" name="categorymembership" value="7" {{ old('categorymembership',$member->membership_applied)=="7" ? "checked":"" }}>
                                                    <label for="cprporatemember">Corporate Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="diplomatedmember" name="categorymembership" value="8" {{ old('categorymembership',$member->membership_applied)=="8" ? "checked":"" }}>
                                                    <label for="diplomatedmember">Diplomate and Foreing National Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <h5>Proposed by (Any Member of chittagong Khulshi Club Ltd.)</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="proposedname">a)Name:</label>
                                                    <input type="text" id="proposedname" class="form-control" value="{{ old('proposedname',$member->proposed_name)}}" name="proposedname">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="membershipno">b)Membership No:</label>
                                                    <input type="text" id="membershipno" class="form-control" value="{{ old('membershipno',$member->membership_no)}}" name="membershipno">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="status">Request for approval</label>
                                                    <select class="form-control form-select" name="status" id="status">
                                                        <option value="">Select yes for approval</option>
                                                        <option value="0" {{ old('status',$member->status)=='0' ? 'selected':''}}>No</option>
                                                        <option value="1" {{ old('status',$member->status)=='1' ? 'selected':''}}>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="submit" class="btn btn-danger m-2">Preview</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

