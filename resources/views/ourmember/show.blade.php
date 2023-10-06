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
            width: 30%;
            outline: 0;
            border-style: dotted;
            border-width: 0 0 1px;
            border-color: blue;
        }
        .binput {
            width: 100%;
            outline: 0;
            border-style: dotted;
            border-width: 0 0 1px;
            border-color: blue;
        }
        input:focus {
            border-color: green
        }


        .gfg {
            border-collapse:separate;
            border-spacing:0 15px;
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
        .font{
            font-family: AdmiralScriptW01-Regular;
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
            border-color: blue
        }
        .bottom2input {
            width: 32%;
            outline: 0;
            border-style: solid;
            border-width: 0 0 1px;
            border-color: blue
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
        <a href="{{route(currentUser().'.dashboard')}}" class="btn no-print"> Go To Dashboard</a>
        <button class="no-print btn" type="button" onclick="window.print()" style="float:right"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
              </svg>
            Print
        </button>
    </div>
    <div class="bg1"  style="width:800px; margin:0 auto;">
        <form action="">
            <table class = "gfg" style=" width:100%">
                <tbody >
                    <tr>
                        <th colspan="3" style="text-align: center;">
                            <h4 style="margin: 0;">ফরম-৫৫ (ক)</h4>
                            <h4 style="margin: 4px;">[ধারা ১৭৯ (১) (গ) এবং বিধি ১৬৭ (১) দ্রষ্টব্য]</h4>
                            <h4 style="margin: 4px;">প্রতিষ্ঠান/ প্রতিষ্ঠানপুঞ্জের শ্রমিক বা কর্মচারী বা মালিকের ট্রেড ইউনিয়নের সদস্য হইবার আবেদন ফরম</h4>
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: left; width:10%;">তারিখ</th>
                        <td style="text-align: left;"><input type="text" class="tinput"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: left;">বরাবর,</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: left;">সভাপতি/সাধারণ সম্পাদক</th>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="tinput"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="tinput"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left;">জনাব,</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left;">
                            <p>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; আমি <input type="text" class="tinput"> ট্রেড ইউনিয়নের সদস্য পদ লাভের জন্য এতদ্বারা আবেদন করিতেছি। আমি সতর্কতার সহিত ট্রেড ইউনিয়নের গঠনতন্ত্রের বিধানসমূহ পড়িয়াছি / পড়িয়া  শুনানো হইলে বুঝিয়াছি এবং উহা মানিয়া চলিতে প্রস্তুত রহিয়াছি।
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
    <div  style="width:800px; margin:0 auto;">
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
                        <th class="tbl_1" style="text-align: left;">৫</th>
                        <th class="tbl_1" style="text-align: left;">জাতীয় পরিচয়পত্র নং</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1">{{ $show_data->nid }}</td>
                    </tr>
                    <tr class="tbl_1">
                        <th class="tbl_1" style="text-align: left;">৬</th>
                        <th class="tbl_1" style="text-align: left;">বয়স (জাতীয় পরিচয়পত্র অনুসারে)</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1">
                            @php
                                $birthDate = $show_data->birth_date;
                                $age = \Carbon\Carbon::parse($birthDate)->age;
                            @endphp
                            {{ $age }}
                        </td>
                    </tr>
                    <tr class="tbl_1">
                        <th class="tbl_1" style="text-align: left;">৭</th>
                        <th class="tbl_1" style="text-align: left;">প্রতিষ্ঠানের নাম ও কর্মক্ষেত্র</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1">{{ $show_data->nameAddress_of_present_institute }}</td>
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
                        <th class="tbl_1" style="text-align: left;">বিভাগ/শাখা/কর্মক্ষেত্র ও পদবী এবং পরিচয়পত্র নং, টোকেন নং (যদি থাকে)</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1"></td>
                    </tr>
                    <tr class="tbl_1">
                        <th class="tbl_1" style="text-align: left;">১০</th>
                        <th class="tbl_1" style="text-align: left;">চাকরির ধরন-- স্থায়ী /বদলি/সাময়িক/অস্থায়ী  শিক্ষানবীশ/শিক্ষাধীন</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1"></td>
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
                        <th class="tbl_1" style="text-align: left;">১৩</th>
                        <th class="tbl_1" style="text-align: left;">রক্তের গ্রুপ</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1">{{ $show_data->blood_group }}</td>
                    </tr>
                    <tr class="tbl_1">
                        <th class="tbl_1" style="text-align: left;">১৪</th>
                        <th class="tbl_1" style="text-align: left;">কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ নবায়ন)</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <th class="tbl_1" style="text-align: left;">..</th>
                        <td class="tbl_1">{{ $show_data->exp_date }}</td>
                    </tr>
                    <tr class="tbl_1">
                        <th class="tbl_1" style="text-align: left;">১৪</th>
                        <th class="tbl_1" style="text-align: left;">
                            কর্মরত প্রতিষ্ঠান কর্তৃক প্রত্যয়ন পত্র<br>
                            লাইসেন্স বিহীন সদস্যের ক্ষেত্রে
                        </th>
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
                <div style="display: inline-block; vertical-align: top;">
                    <p>স্বাক্ষর</p>
                    <p>সাধারণ সম্পাদক</p>
                    <p>নামসহ সীল</p>
                    <p>তারিখ:<input type="text" class="tinput" style="width:50%;"></p>
                </div>
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
                <div style="display: inline-block; vertical-align: top;">
                    <p>স্বাক্ষর</p>
                    <p>সাধারণ সম্পাদক</p>
                    <p>নামসহ সীল</p>
                    <p>তারিখ:<input type="text" class="tinput" style="width:50%;"></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
