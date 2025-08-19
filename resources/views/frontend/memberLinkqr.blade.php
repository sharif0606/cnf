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
                        <table class = "gfg" style=" width:100%; border-spacing: 0;">
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
                                    <td style="text-align: left;">
                                        @if(!$feeCollection->isEmpty())
                                            @foreach ($feeCollection as $fee)
                                                <input type="text" class="tinput" value="{{\Carbon\Carbon::parse($fee->date)->format('d/m/Y')}}">
                                            @endforeach
                                        @else
                                            <input type="text" class="tinput" value="">
                                        @endif
                                    </td>
                                    <td rowspan="7" style="text-align: right;">
                                        <figure style="margin-bottom:0">
                                            <img src='{{asset('uploads/memberImage/'.$show_data->image)}}' height="150px" width="auto">
                                            <figcaption style="text-align: center;padding-left:34px;">সদস্য নং: {{ str_pad($show_data->member_serial_no,5,"0",STR_PAD_LEFT)}}</figcaption>
                                        </figure>
                                    </td>
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
                                    <td colspan="2" style="text-align: left;">জনাব,</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: left;">
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; আমি - <u> {{ $show_data->name_bn }}</u> ট্রেড ইউনিয়নের সদস্য পদ লাভ/নবায়নের জন্য (RSL: {{ str_pad($show_data->renew_serial_no,5,"0",STR_PAD_LEFT)}}) এতদ্বারা আবেদন করিতেছি। আমি সতর্কতার সহিত ট্রেড ইউনিয়নের গঠনতন্ত্রের বিধানসমূহ পড়িয়াছি / পড়িয়া  শুনানো হইলে বুঝিয়াছি এবং উহা মানিয়া চলিতে প্রস্তুত রহিয়াছি।
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
                                    <td class="tbl_1" style="width:40%;">{{ $show_data->name_bn }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">২</th>
                                    <th class="tbl_1" style="text-align: left;">পিতা</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1" >{{ $show_data->father_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৩</th>
                                    <th class="tbl_1" style="text-align: left;">মাতা</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->mother_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৪</th>
                                    <th style="text-align: left;">স্ত্রী  (বিবাহিতের বেলায়) </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->spouse_name }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;"></th>
                                    <th style="text-align: left;">নমিনি  </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @foreach ($nomini as $n)
                                            <span>{{$n->name_of_heirs}} ({{$n->relation}}),</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৫</th>
                                    <th class="tbl_1" style="text-align: left;">জাতীয় পরিচয়পত্র নং<br>রক্তের গ্রুপ</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->nid }} <br> {{ $show_data->blood_group }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৬</th>
                                    <th class="tbl_1" style="text-align: left;">বয়স (জাতীয় পরিচয়পত্র অনুসারে)</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">  
                                        @php
                                            $Born = \Carbon\Carbon::create($show_data->birth_date);
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
                                        {{ $show_data->nameAddress_of_present_institute }},{{ $show_data->place_of_work }}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৮</th>
                                    <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম, ঠিকানা ও নিবন্ধন নং </th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->nameAddress_of_present_institute }},{{ $show_data->address_of_present_institute }},{{ $show_data->registraion_no_of_present_institute }} </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">৯</th>
                                    <th class="tbl_1" style="text-align: left;">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ  নবায়নকৃত)</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if($show_data->exp_date)
                                            {{\Carbon\Carbon::parse($show_data->exp_date)->format('d/m/Y')}}
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
                                        @if($show_data->prottoyon==0)
                                            প্রযোজ্য নয়
                                        @elseif($show_data->prottoyon==1)
                                            আছে
                                        @else
                                            নাই
                                        @endif
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১১</th>
                                    <th class="tbl_1" style="text-align: left;">বর্তমান চাকরিতে যোগদানের তারিখ</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->joining_date }}</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১২</th>
                                    <th class="tbl_1" style="text-align: left;">ঠিকানা (ক) বর্তমান</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">{{ $show_data->present_address }} ({{ $show_data->personal_phone }})</td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;"></th>
                                    <th class="tbl_1" style="text-align: left;">(খ) স্থায়ী</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                            {{ $show_data->village }}, {{ $show_data->post_office }}, {{ $show_data->upazila }}, {{ $show_data->district }}
                                    </td>
                                </tr>
                                <tr class="tbl_1">
                                    <th class="tbl_1" style="text-align: left;">১৩ </th>
                                    <th class="tbl_1" style="text-align: left;">বর্তমান চাকুরী স্থলের পদবি</th>
                                    
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @if ($show_data->designation_of_present_job != '4')
                                            {{$show_data->designation_of_present_job}}
                                        @else
                                            {{$show_data->others_designation}}
                                        @endif
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
                            
                        </div>
                        <div>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width:33%">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td><input type="text" class="tinput" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td><span style="padding-right: 10px;">সভাপতির স্বাক্ষর ও সীল</span></td>
                                            </tr>
                                            <tr>
                                                <td>তারিখ: <input type="text" class="tinput" style="width:70%;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width:33%">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td><input type="text" class="tinput" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td><span style="padding-right: 10px;">সাধারণ সম্পাদকের স্বাক্ষর ও সীল</span></td>
                                            </tr>
                                            <tr>
                                                <td>তারিখ: <input type="text" class="tinput" style="width:70%;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width:33%">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>(<input type="text" class="tinput" style="width:80%;">)</td>
                                            </tr>
                                            <tr>
                                                <td><span style="padding-right: 10px;"> স্বাক্ষর </span></td>
                                            </tr>
                                            <tr>
                                                <td>তারিখ: <input type="text" class="tinput" style="width:70%;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
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