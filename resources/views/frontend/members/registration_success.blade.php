<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        .tinput {
            width: 100%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        input:focus {
            border-color: green
        }


        .gfg {
            border-collapse:separate;
            border-spacing:0 40px;
        }
        .gfg2 {
            border-collapse:separate;
            border-spacing:0 30px;
            }

        .gfg3 {
            border-collapse:separate;
            border-spacing:0 20px;
        }

        .gfg4 {
            border-collapse:separate;
            border-spacing:0 10px;
        }
        .dtable,td, th{

            border-collapse: collapse;
        }

        .photo{

            margin: auto;
            padding-top: 2.3rem;


        }
        .pdiv{
            position: relative;
            background-color: rgba(53, 123, 189, 0.6);
            padding: 10px;

        }
        .pbox{
            width: 120px;
            height: 114px;
            border-style: solid;
            border-radius: 1rem;
            border-width: 2px;
            border-color: #3939b3;
            text-align: center;
            position: absolute;
            bottom: -12px;
            right: 80px;


        }
        .font{
            font-family: AdmiralScriptW01-Regular;
        }
        .binput {
            width: 100%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        .sinput {
            width: 100%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        .finput {
            width: 20%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        .bottominput {
            width: 80%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        .bottom2input {
            width: 32%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
        }
        .bg1{
            background-image: url("{{ asset('./images/bg1.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .bg2{
            background-image: url("{{ asset('./images/bg2.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .bg3{
            background-image: url("{{ asset('./images/bg3.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .bg4{
            background-image: url("{{ asset('./images/bg4.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 1rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: #607080;
    --bs-btn-bg: transparent;
    --bs-btn-border-width: 1px;
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: 0.25rem;
    --bs-btn-box-shadow: inset 0 1px 0 hsla(0,0%,100%,.15),0 1px 1px rgba(0,0,0,.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb),.5);
    background-color: var(--bs-btn-bg);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    color: var(--bs-btn-color);
    cursor: pointer;
    display: inline-block;
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    text-align: center;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    vertical-align: middle;
    --bs-btn-color: #fff;
    --bs-btn-bg: #435ebe;
    --bs-btn-border-color: #435ebe;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #3950a2;
    --bs-btn-hover-border-color: #364b98;
    --bs-btn-focus-shadow-rgb: 95,118,200;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #364b98;
    --bs-btn-active-border-color: #32478f;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #435ebe;
    --bs-btn-disabled-border-color: #435ebe;
}
    </style>
</head>
<body>
    
    <div>
        <a href="{{route('member.dashboard')}}" class="btn no-print"> Go To Dashboard</a>
        <button class="no-print btn" type="button" onclick="window.print()" style="float:right"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
              </svg>
            Print
        </button>
    </div>
    <div class="bg1"  style="width:800px; margin:0 auto;">
        <div>
            <img src="{{ asset('./images/khulsi_club_logo.png')}}" width="100%" height="70px" alt="">
        </div>
        <div style="margin-bottom: 3rem; margin-top: 3rem;">
            <h1 class="font" style="text-align: center;">Application For Membership Form </h1>
        </div>

        <div class="pdiv">
            <div class="tbl1">
                <p style="margin: 0px;">Govt. Reg No: CH-10511/13</p>
                <p style="margin: 0px;">Sanmar Spring Valley,(2463/A/52),1st floor)</p>
                <p style="margin: 0px;">Zakir Hossain,Khulsi,Chittagong.</p>
                <p style="margin: 0px;">Tell:03-657221,2550131</p>
            </div>
            <div class="pbox">
                <td ><p class="photo">Photo 4 Copies Passport Size</p></td>
            </div>
        </div>
        <div style="margin-top: 3rem; margin-bottom: 3rem;">
            <p>Form Number:</p>
        </div>
        <div>
            <p style="margin: 0px;">To</p>
            <p style="margin: 0px;"><b>The Founder President/Founder Vice President</b></p>
            <p style="margin: 0px;">Chittagong Khulshi Club Ltd</p>
            <p style="margin: 0px;">Chittagong</p>
        </div>
        <div style="margin-top: 1rem; margin-bottom: 1rem;">
            <p style="margin: 0px;">Submission For Chittagong Khulsi Club Ltd Membership Form</p>
        </div>
        <form action="">
            <table class = "gfg" style="margin-bottom: 4rem; width:100%">
                <tbody >
                    <tr>
                        <th style="text-align: left; width: 35%;">1.Full Name (Block Capital Letter):</th>
                        <td ><input type="text" class="tinput"  value="{{ $show_data->full_name }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">2.Father's /Husband's Name:</th>
                        <td ><input type="text" class="tinput"  value="{{ $show_data->father_name . $show_data->husban_name }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">3.Mother's Name:</th>
                        <td ><input type="text" class="tinput" value="{{ $show_data->mother_name }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">4.Nominee:</th>
                        <td ><input type="text" class="tinput" value="{{ $show_data->nominee }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">5.Date and Place of Birth:</th>
                        <td ><input type="text" class="tinput" value="{{ $show_data->birth_date }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">Nationality:</th>
                        <td ><input type="text" class="tinput" value="{{ $show_data->nationality }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 35%;">Profession:</th>
                        <td ><input type="text" class="tinput" value="{{ $show_data->profession }}"></td>
                    </tr>

                </tbody>
            </table>
            </div>

        </form>

    </div>
    <div class="bg4" style="width:800px; margin:0 auto;">

        <form action="">
            <table class = "gfg2" style=" width:100%">
                <tr>
                    <th style="text-align: left; width: 14%;">Cell No:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->cell_number }}"></td>
                    <th style="text-align: right;">Tel:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->tel_number }}"></td>
                </tr>
                <tr>
                    <th style="text-align: left; width: 14%;">Fax:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->fax_number }}"></td>
                    <th style="text-align: right; width: 14%;">Email:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->email }}"></td>
                </tr>
                <tr>
                    <th style="text-align: left; width: 14%;">Blood Group:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->blood_group }}"></td>
                </tr>
            </table>
            <table class = "gfg2" style=" width:100%">
                <tbody >
                    <tr>
                        <th  style="text-align: left; width: 37%;">6.National ID N0/Passport No/ Driving No.</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->national_id }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 37%;">7.Educational Qualification:</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->qualification }}"></td>
                    </tr>


                </tbody>
            </table>
            <table class = "gfg2" style=" width:100%">
                <tr>
                    <th style="text-align: left; width: 20%; ">8.Permanent Address:</th>
                </tr>

                <tr>
                    <th style="text-align: right; width: 20%;">Bill:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->village }}"></td>
                    <th style="text-align: right;">P.O:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->postoffice }}"></td>
                </tr>
                <tr>
                    <th style="text-align: right; width: 20%;">P.S/UP:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->upazila }}"></td>
                    <th style="text-align: right; width: 20%;">Dist.:</th>
                    <td ><input type="text" class="sinput" value="{{ $show_data->district }}"></td>
                </tr>

            </table>
            <table class = "gfg2" style=" width:100%">
                <tbody >
                    <tr>
                        <th  style="text-align: left; width: 40%;">9.Present/Mailing Residential Address:</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->present_address }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 40%;">10.Office Address:</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->office_address }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 40%;">11.Details of Other Club Membership(If Any):</th>
                    </tr>
                </tbody>
            </table>
            <div>
                <p>Declaration I, <input type="text" class="finput">hereby declare that I Have Neither Committed any illegal / Criminal act Judiciary Law of Bangladesh, nor been awarded any punishment by Bangladesh Court for any Offence.
                    I further declare that the above statement / particulars are correct therfore, request you to become a Donor, Life, Service, Permanent,
                    Temporary, Corporate,Honorary,Diplomat and Foreign National Member as per constitution of the <b style="color: red;">Chittagong Khulshi Club Ltd</b></p>
            </div>
            <table class = "gfg2" style=" width:100%">
                <tr>
                    <th style="text-align: left; width: 10%; padding-bottom: 5px;">Date:</th>
                    <td style="padding-bottom: 5px;"><input type="text" class="bottominput" value="{{ $show_data->others_date }}"></td>
                    <td style="margin: 0px;"><img width="100px" src="{{asset('uploads/our_member/'.$show_data->signature_applicant)}}" alt="">
                        <p style="margin: 0px; border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid;">Signature of Applicant</p></td>
                </tr>
            </table>
            <div>
                <p><b>Identified by President/Vice President:</b></p>
            </div>
            <table class = "gfg2" style=" width:100%; margin-bottom: 30px;">
                <tr>
                    <td ><input type="text" class="bottom2input" value="{{ $show_data->identify_president }}"></td>
                    <td >Mebmer No:   {{ $show_data->member_no }}</td>
                </tr>
            </table>
        </form>

    </div>


    <div class="bg3" style="width:800px; margin:0 auto;">

        <form action="">
            <table class = "gfg3" style=" width:100%">
                <tbody >
                    <tr>
                        <th  style="text-align: left; width: 12%;">Mr./Mrs.:</th>
                        <td><input type="text" class="binput" value="{{ $show_data->mr_mis }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 12%;">Address:</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->other_address }}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="binput" ></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p>The constitution of club do here by
                    declare you as the Donor, Life Service, Permanent, Temporary, Corporate, Honorary,
                    Diplomat and Foreign National Member of the <b style="color: red;">Chittagong Khulshi Club Ltd.</b>
                    and you Membership No. is<input type="text" class="finput" value="{{ $show_data->member_no }}"></p>
            </div>
            <div>
                <p><b>Thank you</b></p>
            </div>
            <table class = "gfg3" style=" width:100%">
                <tr>
                    <td ><img width="100px" src="{{asset('uploads/signature/'.$show_data->signature_founder_president)}}" alt=""><p style=" border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid; width: 80%;">Founder President<br><b>Chittagong Khulsi Club Ltd.</b></p></td>
                    <td ><img width="100px" src="{{asset('uploads/signature/'.$show_data->signature_founder_vicepresident)}}" alt=""><p style=" border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid; width: 80%;">Founder Vice President<br><b>Chittagong Khulsi Club Ltd.</b></p></td>
                </tr>
            </table>
            <div>
                <p><b>Remarks:</b></p>
            </div>
            <table class = "gfg3" style=" width:100%; margin-bottom: 30px;">
                <tbody >
                    <tr>
                        <td><input type="text" class="binput" value="{{ $show_data->remarks }}"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </div>
	<div class="bg2" style="width:800px; margin:0 auto;">

        <form action="">
            <table class = "gfg4" style=" width:100%">
                <tbody >
                    <tr>
                        <th  style="text-align: left; width: 43%;">12.Updated Income Tax Paid With TIN/GIR No.</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->update_incometax }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; width: 43%;">13.Emergency Contact Person Name and Cell No:</th>
                        <td ><input type="text" class="binput" value="{{ $show_data->emergency_contact }}"></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p><b>14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Details of Passport:</b></p>
                <div style="padding-left: 120px;">
                    <table class = "gfg4" style=" width:100%">
                        <tr>
                            <th style="text-align: left; width: 30%;">1) Passport No and Type:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->passport_notype }}"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left; width: 30%;">2) Place and Date of Issue:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->pdate_issue }}"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left; width: 30%;">3) Issuing Authority:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->issuing_authority }}"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left; width: 30%;">4) Validity:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->validity }}"></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div>
                <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Family Details:</b></p>
                <div style="padding-left: 120px;">
                    <table class = "gfg4" style=" width:100%">
                        <tr>
                            <th style="text-align: left; width: 30%;">1) Name of Spouse:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->name_spouse }}"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left; width: 30%;">2) Occupation of Spouse:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->occupation_spouse }}"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <p><b>15.Details of Children:(Must be Added with Birth Certificate copy)</b></p>
            </div>
            <table class="dtable" style=" width:100%; border: 1px solid;">
                <thead style="padding-top: 10px; padding-bottom: 5px;">
                    <tr style="background-color: red; color: white; text-align: center; ">
                        <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(178, 178, 189);">Serial</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Sex</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Date of Birth</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Occupation with Address</th>
                    </tr>
                </thead>
                <tbody >
                    @if($show_data->children)
                        @foreach($show_data->children as $c)
                            <tr style="text-align: center;">
                                <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{++$loop->index}}</th>
                                <td style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->name }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);"> @if($c->gender==1) Male @elseif($c->gender==2) Female @else @endif </td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->birth_date }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->occupation }}</td>
                            </tr>
                        @endforeach
                    @endif
                   
                </tbody>
            </table>
            <div>
                <p><b>16.Category of Membership Applied for (Please Tick Mark One Box)</b></p>
            </div>
            <div>
                <div style="padding-left: 40px;">
                    <table class = "gfg4" style=" width:100%">
                        <tr>
                            <td ><input type="checkbox" value="1" {{ $show_data->membership_applied=="1" ? "checked":"" }}>&nbsp;Donor Member</td>
                            <td ><input type="checkbox" value="2" {{ $show_data->membership_applied=="2" ? "checked":"" }}>&nbsp;Service Member</td>
                        </tr>
                        <tr>
                            <td ><input type="checkbox" value="3" {{ $show_data->membership_applied=="3" ? "checked":"" }}>&nbsp;Life Member</td>
                            <td ><input type="checkbox" value="4" {{ $show_data->membership_applied=="4" ? "checked":"" }}>&nbsp;Temporary Member</td>
                        </tr>
                        <tr>
                            <td ><input type="checkbox" value="5" {{ $show_data->membership_applied=="5" ? "checked":"" }}>&nbsp;Permanent Member</td>
                            <td ><input type="checkbox" value="6" {{ $show_data->membership_applied=="6" ? "checked":"" }}>&nbsp;Honorary Member</td>
                        </tr>
                        <tr>
                            <td ><input type="checkbox" value="7" {{ $show_data->membership_applied=="7" ? "checked":"" }}>&nbsp;Corporate Member</td>
                            <td ><input type="checkbox" value="8" {{ $show_data->membership_applied=="8" ? "checked":"" }}>&nbsp;Diplomate and Foreing National Member</td>
                        </tr>

                    </table>
                </div>
            </div>
            <div>
                <p><b>17.Proposed by (Any Member of Chittagong Khulsi Club Ltd.):</b></p>
            </div>
            <div>
                <div style="padding-left: 40px;">
                    <table class = "gfg4" style=" width:100%">
                        <tr>
                            <th style="text-align: left; width: 20%;">a) Name:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->proposed_name }}"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left; width: 20%;">b) Membership No:</th>
                            <td ><input type="text" class="sinput" value="{{ $show_data->membership_no }}"></td>
                        </tr>

                    </table>
                </div>
            </div>

            <table class = "gfg4" style=" width:100%">
                <tr>
                    <td style="padding-left: 150px;"></td>
                    <td ><p style=" border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid;"><b>Signature</b></p></td>
                </tr>
            </table>
        </form>

    </div>


</body>
</html>
