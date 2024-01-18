@extends('layout.app')
@section('pageTitle',trans('Member Form Print'))
@section('pageSubTitle',trans('Form'))
@push("styles")
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="container">
    <ul class="nav nav-pills mt-3 mb-5" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link step-1-tab active" id="step-1-tab" data-toggle="pill" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true"><span>ফরম-৫৫ (ক)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link step-2-tab" id="step-2-tab" data-toggle="pill" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false"><span>ফরম-৫৭(ক)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link step-3-tab" id="step-3-tab" data-toggle="pill" href="#step-3" role="tab" aria-controls="step-3" aria-selected="false"><span>ফরম-৫৫(ঘ)</span></a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
            <div class="text-center m-2">
                {{-- <button class="btn btn-sm btn-info" onclick="printDiv('result_show')">Print</button> --}}
                <a href="#" class="no_print" title="print" onclick="printDiv('result_show')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16"><g fill="currentColor"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102c.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645a19.701 19.701 0 0 0 1.062-2.227a7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136c.075-.354.274-.672.65-.823c.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538c.007.187-.012.395-.047.614c-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686a5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465c.12.144.193.32.2.518c.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416a.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95a11.642 11.642 0 0 0-1.997.406a11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238c-.328.194-.541.383-.647.547c-.094.145-.096.25-.04.361c.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193a11.666 11.666 0 0 1-.51-.858a20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41c.24.19.407.253.498.256a.107.107 0 0 0 .07-.015a.307.307 0 0 0 .094-.125a.436.436 0 0 0 .059-.2a.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198a.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283c-.04.192-.03.469.046.822c.024.111.054.227.09.346z"/></g></svg></a>           
            </div>
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
                                    <td style="text-align: left;"><input type="text" class="tinput"></td>
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
                                        {{-- @if($show_data->prottoyon==0)
                                            প্রযোজ্য নয়
                                        @elseif($show_data->prottoyon==1)
                                            "আছে"
                                        @else
                                            "নাই"
                                        @endif --}}
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
                                    <th class="tbl_1" style="text-align: left;">চাকরির ধরন</th>
                                    
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <th class="tbl_1" style="text-align: left;">..</th>
                                    <td class="tbl_1">
                                        @php $mt=array("স্থায়ী","বদলি","সাময়িক","অস্থায়ী শিক্ষানবীশ","শিক্ষাধীন");
                                            $jobType = isset($mt[$show_data->type_of_job])?$mt[$show_data->type_of_job]:'';
                                        @endphp
                                        {{$jobType}}
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
        </div>
        <div  class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
            <div class="text-center m-2">
                <a href="#" class="no_print" title="print" onclick="printDiv('result_show_two')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16"><g fill="currentColor"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102c.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645a19.701 19.701 0 0 0 1.062-2.227a7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136c.075-.354.274-.672.65-.823c.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538c.007.187-.012.395-.047.614c-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686a5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465c.12.144.193.32.2.518c.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416a.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95a11.642 11.642 0 0 0-1.997.406a11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238c-.328.194-.541.383-.647.547c-.094.145-.096.25-.04.361c.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193a11.666 11.666 0 0 1-.51-.858a20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41c.24.19.407.253.498.256a.107.107 0 0 0 .07-.015a.307.307 0 0 0 .094-.125a.436.436 0 0 0 .059-.2a.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198a.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283c-.04.192-.03.469.046.822c.024.111.054.227.09.346z"/></g></svg></a>           
            </div>
            <div id="result_show_two">
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
                                <tr class="tbl_1 text-center">
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
                                <tr class="tbl_1 text-center">
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
                                    <p >সাধারণ সম্পাদকের স্বাক্ষর ও সীল</p>
                                    <p style="padding-right: 170px;">তারিখ:</p>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
            <div class="text-center m-2">
                <a href="#" class="no_print" title="print" onclick="printDiv('result_show_three')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16"><g fill="currentColor"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102c.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645a19.701 19.701 0 0 0 1.062-2.227a7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136c.075-.354.274-.672.65-.823c.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538c.007.187-.012.395-.047.614c-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686a5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465c.12.144.193.32.2.518c.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416a.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95a11.642 11.642 0 0 0-1.997.406a11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238c-.328.194-.541.383-.647.547c-.094.145-.096.25-.04.361c.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193a11.666 11.666 0 0 1-.51-.858a20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41c.24.19.407.253.498.256a.107.107 0 0 0 .07-.015a.307.307 0 0 0 .094-.125a.436.436 0 0 0 .059-.2a.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198a.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283c-.04.192-.03.469.046.822c.024.111.054.227.09.346z"/></g></svg></a>           
            </div>
            <div id="result_show_three">
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
                <div  class="font" style="width:800px; margin:0 auto;">
                    <form class="table_one">
                        <div style="text-align: center; margin-top:1rem;">
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