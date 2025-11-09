@extends('frontend.appqr')
@section('pageTitle',trans('Member'))
@push("styles")
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
@php $setting=\App\Models\setting::first(); @endphp
<div class="container-fluid px-2 px-md-4 py-3">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
            <div class="text-center mb-3 no-print">
                <button class="btn btn-primary btn-lg shadow-sm" onclick="printDiv('result_show')">
                    <i class="bi bi-printer"></i> প্রিন্ট করুন
                </button>
            </div>
            <div id="result_show">
                <style>
                    :root {
                        --primary-color: #357bbd;
                        --border-color: #2c5aa0;
                        --text-color: #1a1a1a;
                        --bg-light: #f8f9fa;
                    }

                    .font {
                        font-family: 'SutonnyMJ', 'Kalpurush', Arial, sans-serif;
                        line-height: 1.6;
                    }

                    .form-wrapper {
                        max-width: 900px;
                        margin: 0 auto;
                        background: white;
                        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                        overflow: hidden;
                    }

                    .form-section {
                        padding: 20px;
                    }

                    .form-header {
                        background: linear-gradient(135deg, var(--primary-color) 0%, #2c5aa0 100%);
                        color: white;
                        padding: 30px 20px;
                        text-align: center;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    .form-header h5 {
                        margin: 8px 0;
                        font-weight: 600;
                        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
                    }

                    .member-photo-section {
                        text-align: center;
                        margin: 20px 0;
                    }

                    .member-photo {
                        border: 3px solid var(--primary-color);
                        border-radius: 8px;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                        max-width: 150px;
                        height: auto;
                    }

                    .member-serial {
                        background: var(--primary-color);
                        color: white;
                        padding: 8px 16px;
                        border-radius: 20px;
                        display: inline-block;
                        margin-top: 10px;
                        font-weight: 600;
                    }

                    .tinput {
                        width: 30%;
                        min-width: 100px;
                        outline: 0;
                        border: none;
                        border-bottom: 1px dotted var(--border-color);
                        background-color: transparent;
                        padding: 2px 5px;
                        font-family: inherit;
                    }

                    .binput {
                        width: 100%;
                        outline: 0;
                        border: none;
                        border-bottom: 1px dotted var(--border-color);
                        background-color: transparent;
                        padding: 2px 5px;
                        font-family: inherit;
                    }

                    input:focus {
                        border-bottom-color: #28a745;
                        background-color: rgba(40, 167, 69, 0.05);
                    }

                    .address-section {
                        background: var(--bg-light);
                        padding: 20px;
                        border-radius: 8px;
                        margin: 15px 0;
                        border-left: 4px solid var(--primary-color);
                    }

                    .address-section p {
                        margin: 8px 0;
                        font-size: 16px;
                    }

                    .intro-text {
                        text-align: justify;
                        text-indent: 60px;
                        line-height: 2;
                        padding: 20px;
                        background: var(--bg-light);
                        border-radius: 8px;
                        margin: 20px 0;
                    }

                    .details-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                        background: white;
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
                    }

                    .details-table th,
                    .details-table td {
                        border: 1px solid #dee2e6;
                        padding: 12px;
                        text-align: left;
                    }

                    .details-table th {
                        background-color: #f1f5f9;
                        font-weight: 600;
                    }

                    .details-table tr:hover {
                        background-color: #f8f9fa;
                    }

                    .details-table .row-number {
                        background: var(--primary-color);
                        color: white;
                        text-align: center;
                        font-weight: bold;
                        width: 40px;
                    }

                    .declaration-box {
                        background: #fff3cd;
                        border: 2px solid #ffc107;
                        border-radius: 8px;
                        padding: 15px;
                        margin: 20px 0;
                    }

                    .declaration-box p {
                        margin: 0;
                        font-weight: 500;
                    }

                    .signature-section {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                        gap: 20px;
                        margin-top: 40px;
                        padding: 20px 0;
                    }

                    .signature-box {
                        text-align: center;
                        padding: 20px;
                        background: var(--bg-light);
                        border-radius: 8px;
                        border: 2px dashed var(--border-color);
                    }

                    .signature-box input {
                        width: 100%;
                        margin-bottom: 10px;
                        border: none;
                        border-bottom: 1px solid var(--border-color);
                        background: transparent;
                        padding: 5px;
                    }

                    .signature-label {
                        font-weight: 600;
                        color: var(--text-color);
                        margin: 10px 0;
                        font-size: 14px;
                    }

                    .date-field {
                        font-size: 14px;
                        margin-top: 10px;
                    }

                    /* Responsive Design */
                    @media screen and (max-width: 768px) {
                        .form-section {
                            padding: 15px;
                        }

                        .form-header {
                            padding: 20px 15px;
                        }

                        .form-header h5 {
                            font-size: 14px;
                        }

                        .details-table th,
                        .details-table td {
                            padding: 8px;
                            font-size: 14px;
                        }

                        .details-table .row-number {
                            width: 30px;
                            font-size: 12px;
                        }

                        .tinput {
                            width: 60%;
                        }

                        .signature-section {
                            grid-template-columns: 1fr;
                        }

                        .intro-text {
                            text-indent: 30px;
                            padding: 15px;
                            font-size: 14px;
                        }

                        .address-section p {
                            font-size: 14px;
                        }
                    }

                    @media screen and (max-width: 480px) {
                        .form-header h5 {
                            font-size: 12px;
                        }

                        .details-table {
                            font-size: 12px;
                        }

                        .details-table th,
                        .details-table td {
                            padding: 6px;
                        }

                        .member-photo {
                            max-width: 120px;
                        }

                        .signature-label {
                            font-size: 12px;
                        }
                    }

                    /* Print Styles */
                    @media print {
                        .no-print {
                            display: none !important;
                        }

                        .form-wrapper {
                            box-shadow: none;
                            max-width: 100%;
                        }

                        .form-section {
                            padding: 10px;
                        }

                        body {
                            background: white;
                        }
                    }
                </style>

                <div class="form-wrapper font">
                    <!-- Header Section -->
                   

                    <!-- Main Content Section -->
                    <div class="form-section">
                        <!-- Date and Photo Section -->
                        <div class="row align-items-start mb-4">
                            <div class="col-md-8 col-sm-12">
                                <img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" alt="" class="mw-100" />
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="member-photo-section">
                                    <img src='{{asset('uploads/memberImage/'.$show_data->image)}}' class="member-photo" alt="Member Photo">
                                    <div class="member-serial">সদস্য নং: {{ str_pad($show_data->member_serial_no,5,"0",STR_PAD_LEFT)}}</div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Details Section -->
                        <div style="margin: 20px 0;">
                            <h6 style="font-weight: 700; margin-bottom: 15px;"><strong>আমার বিবরণ নীচে প্রদত্ত হইলঃ</strong></h6>

                            <table class="details-table">
                                <tbody>
                                    <tr>
                                        <th class="row-number">১</th>
                                        <th style="width: 35%;">নাম</th>
                                        <td colspan="2">{{ $show_data->name_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">২</th>
                                        <th>পিতা</th>
                                        <td colspan="2">{{ $show_data->father_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৩</th>
                                        <th>মাতা</th>
                                        <td colspan="2">{{ $show_data->mother_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৪</th>
                                        <th>স্ত্রী (বিবাহিতের বেলায়)</th>
                                        <td colspan="2">{{ $show_data->spouse_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number"></th>
                                        <th>নমিনি</th>
                                        <td colspan="2">
                                            @foreach ($nomini as $n)
                                                <span>{{$n->name_of_heirs}} ({{$n->relation}}),</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৫</th>
                                        <th>জাতীয় পরিচয়পত্র নং<br>রক্তের গ্রুপ</th>
                                        <td colspan="2">{{ $show_data->nid }} <br> {{ $show_data->blood_group }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৬</th>
                                        <th>বয়স (জাতীয় পরিচয়পত্র অনুসারে)</th>
                                        <td colspan="2">
                                            @php
                                                $Born = \Carbon\Carbon::create($show_data->birth_date);
                                                $Age = $Born->diff(\Carbon\Carbon::now())->format('%d দিন, %m মাস, %y বছর');
                                            @endphp
                                            {{$Age}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৭</th>
                                        <th>প্রতিষ্ঠানের নাম ও কর্মক্ষেত্র</th>
                                        <td colspan="2">
                                            {{ $show_data->nameAddress_of_present_institute }}, {{ $show_data->place_of_work }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৮</th>
                                        <th>প্রতিষ্ঠানের নাম, ঠিকানা ও নিবন্ধন নং</th>
                                        <td colspan="2">{{ $show_data->nameAddress_of_present_institute }}, {{ $show_data->address_of_present_institute }}, {{ $show_data->registraion_no_of_present_institute }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">৯</th>
                                        <th>কাষ্টম সরকার লাইসেন্স মেয়াদ (সর্বশেষ নবায়নকৃত)</th>
                                        <td colspan="2">
                                            @if($show_data->exp_date)
                                                {{\Carbon\Carbon::parse($show_data->exp_date)->format('d/m/Y')}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">১০</th>
                                        <th>
                                            কর্মরত প্রতিষ্ঠান কর্তৃক প্রত্যয়ন পত্র<br>
                                            (লাইসেন্স বিহীন সদস্যদের ক্ষেত্রে প্রযোজ্য)
                                        </th>
                                        <td colspan="2">
                                            @if($show_data->prottoyon==0)
                                                প্রযোজ্য নয়
                                            @elseif($show_data->prottoyon==1)
                                                আছে
                                            @else
                                                নাই
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">১১</th>
                                        <th>বর্তমান চাকরিতে যোগদানের তারিখ</th>
                                        <td colspan="2">{{ $show_data->joining_date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">১২</th>
                                        <th>ঠিকানা (ক) বর্তমান</th>
                                        <td colspan="2">{{ $show_data->present_address }} ({{ $show_data->personal_phone }})</td>
                                    </tr>
                                    <tr>
                                        <th class="row-number"></th>
                                        <th>(খ) স্থায়ী</th>
                                        <td colspan="2">
                                            {{ $show_data->village }}, {{ $show_data->post_office }}, {{ $show_data->upazila }}, {{ $show_data->district }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">১৩</th>
                                        <th>বর্তমান চাকুরী স্থলের পদবি</th>
                                        <td colspan="2">
                                            @if ($show_data->designation_of_present_job != '4')
                                                {{$show_data->designation_of_present_job}}
                                            @else
                                                {{$show_data->others_designation}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="row-number">১৪</th>
                                        <th>সর্বশেষ রিনিউ</th>
                                        <td colspan="2">
                                            @if(!$feeCollection->isEmpty())
                                                @foreach ($feeCollection as $fee)
                                                    ({{ $fee->year }})
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
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
        WinPrint.onload = function(){
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    }
</script>
@endpush
