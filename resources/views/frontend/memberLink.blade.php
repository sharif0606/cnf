@extends('frontend.app')
@section('pageTitle',trans('Member'))
@push("styles")
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
            <!-- <div class="text-center">
                <button class="btn btn-sm btn-info" onclick="printDiv('result_show')">Print</button>
            </div> -->
            <div id="result_show">
                <style>
                    .tinput {
                        width: 30%;
                        outline: 0;
                        border-style: dotted;
                        border-width: 0 0 1px;
                        border-color: blue;
                        background-color: transparent;
                    }
                    .binput {
                        width: 100%;
                        outline: 0;
                        border-style: dotted;
                        border-width: 0 0 1px;
                        border-color: blue;
                        background-color: transparent;
                    }
                    input:focus {
                        border-color: green
                    }
            
            
                    .gfg {
                        border-collapse:separate;
                        border-spacing:0 6px;
                    }
                    .gfg2 {
                        border-collapse:separate;
                        border-spacing:0 5px;
                        }
            
                    .pdiv{
                        position: relative;
                        background-color: rgba(53, 123, 189, 0.6);
                        padding: 20px 12px 20px 12px;
            
            
                    }
                    .table_one .tbl_1{
                        border: 1px solid;
                        border-collapse: collapse;
                        padding: 5px;
                    }
                    .bottominput {
                        width: 80%;
                        outline: 0;
                        border-style: solid;
                        border-width: 0 0 1px;
                        border-color: blue;
                        background-color: transparent;
                    }
                    .bottom2input {
                        width: 32%;
                        outline: 0;
                        border-style: solid;
                        border-width: 0 0 1px;
                        border-color: blue;
                        background-color: transparent;
                    }
                </style>
                <div class="font"  style="width:800px; margin:0 auto;">
                    <form action="">
                        <table class = "gfg" style=" width:100%">
                            <tbody >
                                <tr>
                                    <th colspan="3" style="text-align: center;">
                                        <h5 style="margin: 0;"><u>ফরম-৫৫ (ক)</u></h5>
                                        <h5 style="margin: 4px;">[ধারা ১৭৯ (১) (গ) এবং বিধি ১৬৭ (১) দ্রষ্টব্য]</h5>
                                        <h5 style="margin: 4px;">প্রতিষ্ঠান/ প্রতিষ্ঠানপুঞ্জের শ্রমিক বা কর্মচারী বা মালিকের ট্রেড ইউনিয়নের সদস্য/নবায়নের আবেদন ফরম</h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: left; width:10%;">তারিখ</th>
                                    <td style="text-align: left;"><input type="text" class="tinput"></td>
                                    <td rowspan="5" style="text-align: right;"><img src="{{asset('uploads/memberImage/'.$member?->image)}}" height="150px" width="auto"></td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left;">বরাবর,</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left;">সভাপতি / সাধারণ সম্পাদক</th>
                                </tr>
                                <tr>
                                    <td colspan="2"> চট্টগ্রাম ক্লিয়ারিং এন্ড ফরওয়ার্ডিং এজেন্টস কর্মচারী ইউনিয়ন (সি বি এ) </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center">( রেজি : নং - চট্ট - ২৩৪) </td>
                                </tr>
                                <tr>
                                    <td colspan="2">১নং জেটি গেইট, জামে মসজিদ সংলগ্ন, বারিক বিল্ডিং, চট্টগ্রাম </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: left;">জনাব,</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: left;">
                                        <p style="margin: 0px;">
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; আমি - <u> {{ $member?->name_bn }}</u> ট্রেড ইউনিয়নের সদস্য পদ লাভ/নবায়নের জন্য এতদ্বারা আবেদন করিতেছি। আমি সতর্কতার সহিত ট্রেড ইউনিয়নের গঠনতন্ত্রের বিধানসমূহ পড়িয়াছি / পড়িয়া  শুনানো হইলে বুঝিয়াছি এবং উহা মানিয়া চলিতে প্রস্তুত রহিয়াছি।
                                        </p>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th colspan="3" style="text-align: left;">আমার বিবরণ নীচে প্রদত্ত হইলঃ</th>
                                </tr> --}}
                            </tbody>
                        </table>
                    </form>
                </div>
                <div  class="font" style="width:800px; margin:0 auto;">
                    <form class="table_one" action="">
                        <div><b>আমার বিবরণ নীচে প্রদত্ত হইলঃ</b></div>
                        <table  class="tbl_1" style=" width:100%; border: 1px solid; border-collapse: collapse; border-spacing: 0;">
                            <tbody>
                                <tr class="tbl_1" >
                                    <th class="tbl_1" style="text-align: left; width:2%;">১</th>
                                    <th class="tbl_1" style="text-align: left; width:54%;">নাম</th>
                                    <th class="tbl_1" style="text-align: left; width:2%;">..</th>
                                    <th class="tbl_1" style="text-align: left; width:2%;">..</th>
                                    <td class="tbl_1" style="width:40%;">{{ $member?->name_bn }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">২</th>
                                    <th class="tbl_1" style="text-align: left;">পিতা</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1" >{{ $member?->father_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৩</th>
                                    <th class="tbl_1" style="text-align: left;">মাতা</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->mother_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৪</th>
                                    <th style="text-align: left;">স্ত্রী  (বিবাহিতের বেলায়) </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->spouse_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;"></th>
                                    <th style="text-align: left;">নমিনি  </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if($nomini != '')
                                            @foreach ($nomini as $n)
                                                <span>{{$n->name_of_heirs}} ({{$n->relation}}),</span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৫</th>
                                    <th class="tbl_1" style="text-align: left;">জাতীয় পরিচয়পত্র নং<br>মোবাইল<br>রক্তের গ্রুপ</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->nid }} <br>{{ $member?->personal_phone }}<br> {{ $member?->blood_group }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৬</th>
                                    <th class="tbl_1" style="text-align: left;">বয়স (জাতীয় পরিচয়পত্র অনুসারে)</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">  
                                        @php
                                            $Born = \Carbon\Carbon::create($member?->birth_date);
                                            $Age = $Born->diff(\Carbon\Carbon::now())->format('%d দিন, %m মাস, %y বছর');
                                        @endphp
                                        {{$Age}}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৭</th>
                                    <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম ও কর্মক্ষেত্র</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        {{ $member?->nameAddress_of_present_institute }},{{ $member?->place_of_work }}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৮</th>
                                    <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম, ঠিকানা ও নিবন্ধন নং </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->nameAddress_of_present_institute }},{{ $member?->address_of_present_institute }},{{ $member?->registraion_no_of_present_institute }} </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৯</th>
                                    <th class="tbl_1" style="text-align: left;">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ  নবায়নকৃত)</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if($member->exp_date)
                                            {{\Carbon\Carbon::parse($member?->exp_date)->format('d/m/Y')}}
                                        @endif
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১০</th>
                                    <th class="tbl_1" style="text-align: left;">
                                        কর্মরত প্রতিষ্ঠান কর্তৃক প্রত্যয়ন পত্র<br>
                                        (লাইসেন্স বিহীন সদস্যদের ক্ষেত্রে প্রযোজ্য )
                                    </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if($member->prottoyon==0)
                                            প্রযোজ্য নয়
                                        @elseif($member->prottoyon==1)
                                            "আছে"
                                        @else
                                            "নাই"
                                        @endif
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১১</th>
                                    <th class="tbl_1" style="text-align: left;">বর্তমান চাকরিতে যোগদানের তারিখ</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->joining_date }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১২</th>
                                    <th class="tbl_1" style="text-align: left;">ঠিকানা (ক) বর্তমান</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $member?->present_address }} ({{ $member?->personal_phone }})</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;"></th>
                                    <th class="tbl_1" style="text-align: left;">(খ) স্বায়ী</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                            {{ $member?->village }}, {{ $member?->post_office }}, {{ $member?->upazila }}, {{ $member?->district }}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১৩ </th>
                                    <th class="tbl_1" style="text-align: left;">চাকরির ধরন</th>
                                    
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @php $mt=array("স্থায়ী","বদলি","সাময়িক","অস্থায়ী শিক্ষানবীশ","শিক্ষাধীন");
                                            $jobType = isset($mt[$member->type_of_job])?$mt[$member->type_of_job]:'';
                                        @endphp
                                        {{$jobType}}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১৪ </th>
                                    <th class="tbl_1" style="text-align: left;">সর্বশেষ রিনিউ</th>
                                    
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if(!$feeCollection->isEmpty())
                                            @foreach ($feeCollection as $fee)
                                                {{ money_format($fee->total_amount) }} টাকা
                                                ({{ $fee->year }})
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <p style="margin: 0px;">আমি ঘোষণা করিতেছি যে,ধারা ১৯৩ অনুযায়ী আমি প্রতিষ্ঠান/প্রতিষ্ঠানপুঞ্জের অন্য কোন শ্রমিক/মালিকদের ট্রেড ইউনিয়নের সদস্য নই।</p>
                        </div>
                        <div style="text-align: end;">
                            <div>
                                <div>(<input type="text" class="tinput">)</div>
                                <div style="padding-right:107px;">স্বাক্ষর </div>
                                <div style="padding-right:23px;">তারিখ:<input type="text" class="tinput" style="width:20%;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <form method="post" action="{{route(currentUser().'.to_approve_update',encryptor('encrypt',$member->id))}}">
                @csrf
                <div class="d-none">
                    <input type="date" name="member_approval_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-1">Approve</button>
                </div>
            </form> --}}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    function printDiv(divName) {
        var prtContent = document.getElementById(divName);
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" type="text/css"/>');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.onload =function(){
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    }
</script>
@endpush