@extends('layout.app')
@section('pageTitle',trans('Member Show'))
@section('pageSubTitle',trans('Show'))
@push("styles")
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
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
        /* .font{
            font-family: AdmiralScriptW01-Regular !important;
        } */
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
<div class="container">
    <div class="d-flex justify-content-between">
        <button class="btn btn-primary" onclick="buttonFunntionOne">ফরম-৫৫ (ক)</button>
        <button class="btn btn-primary" onclick="buttonFunntionTwo">ফরম-৫৫ (ক)</button>
        <button class="btn btn-primary" onclick="buttonFunntionThree">ফরম-৫৫ (ক)</button>
    </div>
<section class="section-one d-none">
    <div class="text-center">
        <button class="btn btn-sm btn-info">Print</button>
    </div>
    <div id="result">
        <div class="font"  style="width:800px; margin:0 auto;">
            <form action="">
                <table class = "gfg" style=" width:100%">
                    <tbody >
                        <tr>
                            <th colspan="3" style="text-align: center;">
                                <h4 style="margin: 0;"><u>ফরম-৫৫ (ক)</u></h4>
                                <h4 style="margin: 4px;">[ধারা ১৭৯ (১) (গ) এবং বিধি ১৬৭ (১) দ্রষ্টব্য]</h4>
                                 <h4 style="margin: 4px;">প্রতিষ্ঠান/ প্রতিষ্ঠানপুঞ্জের শ্রমিক বা কর্মচারী বা মালিকের ট্রেড ইউনিয়নের সদস্য/নবায়নের আবেদন ফরম</h4>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left; width:10%;">তারিখ</th>
                            <td style="text-align: left;"><input type="text" class="tinput"></td>
                            <td rowspan="5" style="text-align: right;"><img src='{{asset('uploads/memberImage/'.$show_data->image)}}' height="150px" width="auto"></td>
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
                                <p>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; আমি - <u> {{ $show_data->name_bn }}</u> ট্রেড ইউনিয়নের সদস্য পদ লাভ/নবায়নের জন্য এতদ্বারা আবেদন করিতেছি। আমি সতর্কতার সহিত ট্রেড ইউনিয়নের গঠনতন্ত্রের বিধানসমূহ পড়িয়াছি / পড়িয়া  শুনানো হইলে বুঝিয়াছি এবং উহা মানিয়া চলিতে প্রস্তুত রহিয়াছি।
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align: left;">আমার বিবরণ নীচে প্রদত্ত হইলঃ</th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div  class="font" style="width:800px; margin:0 auto;">
            <form class="table_one" action="">
                <table  class="tbl_1" style=" width:100%; border: 1px solid; border-collapse: collapse;">
                    <tbody>
                        <tr class="tbl_1" >
                            <th class="tbl_1" style="text-align: left; width:2%;">১</th>
                            <th class="tbl_1" style="text-align: left; width:62%;">নাম</th>
                            <th class="tbl_1" style="text-align: left; width:2%;">..</th>
                            <th class="tbl_1" style="text-align: left; width:2%;">..</th>
                            <td class="tbl_1" style="width:32%;">{{ $show_data->name_bn }}</td>
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
                                    <span>{{$n->name_of_heirs}},</span>
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
                                    $birthDate = $show_data->birth_date;
                                    //$age = \Carbon\Carbon::parse($birthDate)->age;
                                @endphp
                                দিন: {{ date('d',strtotime($birthDate)) }}, মাস: {{ date('F',strtotime($birthDate)) }}, সাল:{{ date('Y',strtotime($birthDate)) }}
                            </td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;">৭</th>
                            <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম ও কর্মক্ষেত্র</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">
                                {{ $show_data->nameAddress_of_present_institute }}
                            </td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;">৮</th>
                            <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম, ঠিকানা ও নিবন্ধন নং </th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">{{ $show_data->nameAddress_of_present_institute }} </td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;">৯</th>
                            <th class="tbl_1" style="text-align: left;">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ  নবায়নকৃত)</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">{{ $show_data->exp_date }}</td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;">১০</th>
                            <th class="tbl_1" style="text-align: left;">
                                কর্মরত প্রতিষ্ঠান কর্তৃক প্রত্যয়ন পত্র<br>
                                (লাইসেন্স বিহীন সদস্যদের ক্ষেত্রে প্রযোজ্য )
                            </th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">{{ $show_data->prottoyon == 0?"আছে":"নাই" }}</td>
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
                            <td class="tbl_1">{{ $show_data->present_address }}</td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;"></th>
                            <th class="tbl_1" style="text-align: left;">(খ) স্বায়ী</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">
                                    {{ $show_data->village }}, {{ $show_data->upazila }}, {{ $show_data->district }}
                            </td>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1" style="text-align: left;">১৩ </th>
                            <th class="tbl_1" style="text-align: left;">চাকরির ধরন-- স্থায়ী /বদলি/সাময়িক/অস্থায়ী  শিক্ষানবীশ/শিক্ষাধীন</th>
                            
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <th class="tbl_1" style="text-align: left;">..</th>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <p>আমি ঘোষণা করিতেছি যে, ধারা ১৯৩ অনুযায়ী আমি প্রতিষ্ঠান/প্রতিষ্ঠানপুঞ্জের অন্য কোন শ্রমিক/মালিকদের ট্রেড ইউনিয়নের সদস্য নই। </p>
                </div>
                <div style="text-align: end; margin-bottom: 2rem;">
                    <div>
                        <div>(<input type="text" class="tinput">)</div>
                        <div style="padding-right:107px;">স্বাক্ষর </div>
                        <div style="padding-right:23px;">তারিখ:<input type="text" class="tinput" style="width:20%;"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="section-two d-none">
    <div class="text-center">
        <button class="btn btn-sm btn-info">Print</button>
    </div>
    <div id="result2">
        <div  class="font" style="width:800px; margin:0 auto;">
            <form class="table_one">
                <div style="text-align: center; margin-bottom: 5rem;">
                    <h4>ফরম-৫৭(ক)</h4>
                    <h4>[ ধারা ১৭৮ বিধি এবং ১৬৮(৬) ]</h4>
                    <h4>ইউনিয়নের সদস্যদের বিবরন</h4>
                </div>
                <div style="padding-top: 10px; padding-bottom:10px;">ট্রেড ইউনিয়ন সংগঠনের নাম ও ঠিকানা: <input type="text" class="tinput" style="width:65%;"></div>
                <div style="padding-top: 10px; padding-bottom:10px; margin-bottom:4rem;">শিল্প/প্রতিষ্ঠানের নাম ও ও ঠিকানা: <input type="text" class="tinput" style="width:70%;"></div>
                <table class="tbl_1" style=" width:100%; ">
                    <thead>
                        <tr class="tbl_1">
                            <th class="tbl_1" rowspan="2">ক্রমিক নং</th>
                            <th class="tbl_1" rowspan="2">নাম ও জাতীয় পরিচয় পত্র (যদি থাকে)</th>
                            <th class="tbl_1" rowspan="2">সদস্য নং (ফোন নং- যদি থাকে)</th>
                            <th class="tbl_1" rowspan="2">ইউনিয়নের পদ</th>
                            <th class="tbl_1" rowspan="2">পিতা/স্বামীর নাম</th>
                            <th class="tbl_1" rowspan="2">জন্ম তারিখ ও বয়স</th>
                            <th class="tbl_1" colspan="2" >ঠিকানা</th>
                            <th class="tbl_1" rowspan="2">বিভাগ/শাখা</th>
                            <th class="tbl_1" rowspan="2">পদবী পেশা/বৃত্তি</th>
                            <th class="tbl_1" rowspan="2">মন্তব্য</th>
                        </tr>
                        <tr class="tbl_1">
                            <th class="tbl_1">স্বায়ী</th>
                            <th class="tbl_1">বর্তমান কর্মস্থল</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tbl_1">
                            <td class="tbl_1">১</td>
                            <td class="tbl_1">{{ $show_data->name_bn }}<br>{{ $show_data->nid }}</td>
                            <td class="tbl_1">{{ $show_data->member_serial_no }}<br>{{ $show_data->personal_phone  }}</td>
                            <td class="tbl_1"></td>
                            <td class="tbl_1">{{ $show_data->father_name }}</td>
                            <td class="tbl_1">{{ $show_data->birth_date }}<br>বয়স:
                                @php
                                $birthDate = $show_data->birth_date;
                                $age = \Carbon\Carbon::parse($birthDate)->age;
                                @endphp
                                {{ $age }}
                            </td>
                            <td class="tbl_1">{{ $show_data->present_address }}</td>
                            <td class="tbl_1">{{ $show_data->nameAddress_of_present_institute }}</td>
                            <td class="tbl_1">{{ $show_data->district }}</td>
                            <td class="tbl_1">{{ $show_data->designation_of_present_job }}</td>
                            <td class="tbl_1"></td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        <tr class="tbl_1">
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                            <td class="tbl_1">&nbsp;</td>
                        </tr>
                        
                    </tbody>
                </table>
                <table style="width: 100%; margin-top: 5rem; margin-bottom:5rem;">
                    <tr>
                        <td style="text-align: left;">
                            <p><input type="text" class="tinput" style="width:50%;"></p>
                            <p>সভাপতির স্বাক্ষর ও সীল</p>
                            <p>তারিখ:</p>
                        </td>
                        <td style="text-align: end;">
                            <p><input type="text" class="tinput" style="width:50%;"></p>
                            <p style="padding-right: 10px;">সাধারণ সম্পাদকের স্বাক্ষর ও সীল</p>
                            <p style="padding-right: 185px;">তারিখ:</p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<section class="section-three d-none">
    <div class="text-center">
        <button class="btn btn-sm btn-info">Print</button>
    </div>
    <div id="result3">
        <div  class="font" style="width:800px; margin:0 auto;">
            <form class="table_one">
                <div style="text-align: center; margin-top:20rem;">
                    <h4>ফরম-৫৫(ঘ)</h4>
                    <h4>[ বিধি ১৬৭(৩) দ্রষ্টব্য ]</h4>
                    <h4>ইউনিয়ের সদস্য হিসেবে প্রত্যয়নপত্র</h4>
                </div>
                <table class="gfg2" style=" width:100%;">
                    <tr>
                        <th style="text-align: left;">ইউনিয়নের নাম ও ঠিকানা:</th>
                        <td colspan="3"><input type="text" class="binput"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">রেজি নং:</th>
                        <td colspan="3"><input type="text" class="binput"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">নাম:</th>
                        <td><input type="text" class="binput" value="{{ $show_data->name_bn }}"></td>
                        <th style="text-align: left;">সদস্য নং:</th>
                        <td><input type="text" class="binput" value="{{ $show_data->member_serial_no }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">পদবি:</th>
                        <td colspan="2"><input type="text" class="binput" value="{{ $show_data->designation_of_present_job }}"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">
                            <p>
                                জনাব, <br><br> আপনার <input type="text" class="tinput"> তারিখের আবেদনের প্রেক্ষিতে আপনাকে অত্র ইউনিয়ের সদস্য হিসাবে অন্তর্ভুক্ত করা হইল।
                            </p>
                        </td>
                    </tr>
                </table>
                <div style="margin-top: 2rem; ">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <p><input type="text" class="tinput" style="width:50%;"></p>
                                <p style="padding-right: 10px;">সভাপতির স্বাক্ষর ও সীল</p>
                                <p style="padding-right: 185px;">তারিখ:</p>
                            </td>
                            <td style="text-align: end;">
                                <div style="display: inline-block; vertical-align: top;">
                                    <p>স্বাক্ষর</p>
                                    <p>সাধারণ সম্পাদক</p>
                                    <p>নামসহ সীল</p>
                                    <p>তারিখ:<input type="text" class="tinput" style="width:50%;"></p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="text-align: center;">
                    <h4>ফরম-৫৫(ঘ)</h4>
                    <h4>[ বিধি ১৬৭(৩) দ্রষ্টব্য ]</h4>
                    <h4>ইউনিয়ের সদস্য হিসেবে প্রত্যয়নপত্র</h4>
                </div>
                <table class="gfg2" style=" width:100%;">
                    <tr>
                        <th style="text-align: left;">ইউনিয়নের নাম ও ঠিকানা:</th>
                        <td colspan="3"><input type="text" class="binput"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">রেজি নং:</th>
                        <td colspan="3"><input type="text" class="binput"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">নাম:</th>
                        <td><input type="text" class="binput" value="{{ $show_data->name_bn }}"></td>
                        <th style="text-align: left;">সদস্য নং:</th>
                        <td><input type="text" class="binput" value="{{ $show_data->member_serial_no }}"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">পদবি:</th>
                        <td colspan="2"><input type="text" class="binput" value="{{ $show_data->designation_of_present_job }}"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">
                            <p>
                                জনাব, <br><br> আপনার <input type="text" class="tinput"> তারিখের আবেদনের প্রেক্ষিতে আপনাকে অত্র ইউনিয়ের সদস্য হিসাবে অন্তর্ভুক্ত করা হইল।
                            </p>
                        </td>
                    </tr>
                </table>
                <div style="margin-top: 2rem; ">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <p><input type="text" class="tinput" style="width:50%;"></p>
                                <p style="padding-right: 10px;">সভাপতির স্বাক্ষর ও সীল</p>
                                <p style="padding-right: 185px;">তারিখ:</p>
                            </td>
                            <td style="text-align: end;">
                                <div style="display: inline-block; vertical-align: top;">
                                    <p>স্বাক্ষর</p>
                                    <p>সাধারণ সম্পাদক</p>
                                    <p>নামসহ সীল</p>
                                    <p>তারিখ:<input type="text" class="tinput" style="width:50%;"></p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</section>
</div>

@endsection
@push('scripts')
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