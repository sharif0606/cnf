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
            <!-- Modern Print Button -->
            <div class="text-center mb-4 no-print">
                <button class="modern-print-btn" onclick="printDiv('result_show')">
                    <i class="bi bi-printer"></i>
                    <span>প্রিন্ট করুন</span>
                </button>
            </div>

            <div id="result_show">
                <style>
                    :root {
                        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                        --primary-color: #667eea;
                        --secondary-color: #764ba2;
                        --accent-color: #f5576c;
                        --text-dark: #2d3748;
                        --text-light: #718096;
                        --bg-light: #f7fafc;
                        --bg-white: #ffffff;
                        --border-color: #e2e8f0;
                        --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
                        --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
                        --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
                        --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
                    }

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .font {
                        font-family: 'SutonnyMJ', 'Kalpurush', Arial, sans-serif;
                        line-height: 1.7;
                        color: var(--text-dark);
                    }

                    /* Modern Print Button */
                    .modern-print-btn {
                        background: var(--primary-gradient);
                        color: white;
                        border: none;
                        padding: 14px 40px;
                        border-radius: 50px;
                        font-size: 16px;
                        font-weight: 600;
                        cursor: pointer;
                        display: inline-flex;
                        align-items: center;
                        gap: 10px;
                        box-shadow: var(--shadow-lg);
                        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                        position: relative;
                        overflow: hidden;
                    }

                    .modern-print-btn::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 100%);
                        transform: translateX(-100%);
                        transition: transform 0.3s;
                    }

                    .modern-print-btn:hover {
                        transform: translateY(-3px);
                        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
                    }

                    .modern-print-btn:hover::before {
                        transform: translateX(0);
                    }

                    .modern-print-btn:active {
                        transform: translateY(-1px);
                    }

                    /* Main Wrapper */
                    .form-wrapper {
                        max-width: 1000px;
                        margin: 0 auto;
                        background: var(--bg-white);
                        box-shadow: var(--shadow-xl);
                        border-radius: 20px;
                        overflow: hidden;
                        position: relative;
                    }

                    .form-wrapper::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        height: 6px;
                        background: var(--primary-gradient);
                    }

                    /* Header Section */
                    .modern-header {
                        background: var(--bg-light);
                        padding: 30px 20px;
                        position: relative;
                    }

                    .header-content {
                        display: grid;
                        grid-template-columns: 1fr auto;
                        gap: 30px;
                        align-items: start;
                    }

                    .header-info {
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                    }

                    .header-info img {
                        max-width: 100%;
                        height: auto;
                        max-height: 120px;
                        object-fit: contain;
                    }

                    .contact-info {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                        margin-top: 10px;
                    }

                    .contact-info span {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        color: var(--text-light);
                        font-size: 14px;
                    }

                    .contact-info i {
                        color: var(--primary-color);
                        font-size: 16px;
                    }

                    /* Member Photo Card */
                    .member-photo-card {
                        background: var(--bg-white);
                        padding: 20px;
                        border-radius: 16px;
                        text-align: center;
                        box-shadow: var(--shadow-md);
                        position: relative;
                        transition: transform 0.3s;
                    }

                    .member-photo-card:hover {
                        transform: translateY(-5px);
                        box-shadow: var(--shadow-lg);
                    }

                    .photo-frame {
                        position: relative;
                        display: inline-block;
                        margin-bottom: 15px;
                    }

                    .photo-frame::before {
                        content: '';
                        position: absolute;
                        inset: -5px;
                        background: var(--primary-gradient);
                        border-radius: 16px;
                        z-index: -1;
                        opacity: 0.7;
                    }

                    .member-photo {
                        width: 150px;
                        height: 180px;
                        object-fit: cover;
                        border-radius: 12px;
                        border: 4px solid white;
                        display: block;
                    }

                    .member-badge {
                        background: var(--primary-gradient);
                        color: white;
                        padding: 10px 20px;
                        border-radius: 25px;
                        font-weight: 700;
                        font-size: 14px;
                        display: inline-block;
                        box-shadow: var(--shadow-md);
                        letter-spacing: 0.5px;
                    }

                    /* Content Section */
                    .form-section {
                        padding: 40px 30px;
                    }

                    .section-title {
                        font-size: 20px;
                        font-weight: 800;
                        color: var(--text-dark);
                        margin-bottom: 25px;
                        padding-bottom: 12px;
                        border-bottom: 3px solid var(--primary-color);
                        position: relative;
                        display: inline-block;
                    }

                    .section-title::after {
                        content: '';
                        position: absolute;
                        bottom: -3px;
                        left: 0;
                        width: 50px;
                        height: 3px;
                        background: var(--accent-color);
                    }

                    /* Modern Details Table */
                    .details-table {
                        width: 100%;
                        border-collapse: separate;
                        border-spacing: 0;
                        margin: 25px 0;
                        background: var(--bg-white);
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: var(--shadow-sm);
                    }

                    .details-table tbody {
                        border: 1px solid var(--border-color);
                        border-radius: 12px;
                    }

                    .details-table tr {
                        transition: all 0.2s;
                    }

                    .details-table tr:hover {
                        background: var(--bg-light);
                    }

                    .details-table th,
                    .details-table td {
                        padding: 16px;
                        text-align: left;
                        border-bottom: 1px solid var(--border-color);
                    }

                    .details-table tr:last-child th,
                    .details-table tr:last-child td {
                        border-bottom: none;
                    }

                    .details-table .row-number {
                        width: 50px;
                        text-align: center;
                        font-weight: 800;
                        font-size: 18px;
                        background: var(--primary-gradient);
                        color: white;
                        position: relative;
                    }

                    .details-table .row-number::after {
                        content: '';
                        position: absolute;
                        right: 0;
                        top: 0;
                        bottom: 0;
                        width: 3px;
                        background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.3), transparent);
                    }

                    .details-table th:not(.row-number) {
                        font-weight: 700;
                        color: var(--text-dark);
                        background: var(--bg-light);
                        width: 35%;
                        font-size: 15px;
                    }

                    .details-table td {
                        color: var(--text-dark);
                        font-size: 15px;
                        font-weight: 500;
                    }

                    /* Nominee Section Styling */
                    .nominee-list {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 8px;
                    }

                    .nominee-list span {
                        background: var(--bg-light);
                        padding: 6px 12px;
                        border-radius: 8px;
                        font-size: 14px;
                        display: inline-block;
                        border-left: 3px solid var(--primary-color);
                    }

                    /* Responsive Design */
                    @media screen and (max-width: 768px) {
                        .header-content {
                            grid-template-columns: 1fr;
                            gap: 20px;
                        }

                        .member-photo-card {
                            max-width: 100%;
                        }

                        .form-section {
                            padding: 25px 20px;
                        }

                        .section-title {
                            font-size: 18px;
                        }

                        .details-table {
                            font-size: 13px;
                        }

                        .details-table th,
                        .details-table td {
                            padding: 12px 10px;
                        }

                        .details-table .row-number {
                            width: 40px;
                            font-size: 14px;
                        }

                        .details-table th:not(.row-number) {
                            font-size: 13px;
                        }

                        .details-table td {
                            font-size: 13px;
                        }

                        /* Stack table cells on very small screens */
                        .modern-print-btn {
                            padding: 12px 30px;
                            font-size: 14px;
                        }
                    }

                    @media screen and (max-width: 576px) {
                        .form-wrapper {
                            border-radius: 12px;
                        }

                        .modern-header {
                            padding: 20px 15px;
                        }

                        .form-section {
                            padding: 20px 15px;
                        }

                        .member-photo {
                            width: 120px;
                            height: 150px;
                        }

                        .section-title {
                            font-size: 16px;
                        }

                        .details-table th,
                        .details-table td {
                            padding: 10px 8px;
                            font-size: 12px;
                        }

                        .contact-info span {
                            font-size: 12px;
                        }

                        .nominee-list span {
                            font-size: 12px;
                            padding: 4px 8px;
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
                            border-radius: 0;
                        }

                        .form-wrapper::before {
                            display: none;
                        }

                        .modern-header,
                        .form-section {
                            padding: 15px;
                        }

                        .member-photo-card {
                            box-shadow: none;
                        }

                        .member-photo-card:hover {
                            transform: none;
                        }

                        .details-table {
                            box-shadow: none;
                        }

                        .details-table tr:hover {
                            background: transparent;
                        }

                        body {
                            background: white;
                        }

                        @page {
                            margin: 1cm;
                        }
                    }

                    /* Animation keyframes */
                    @keyframes fadeInUp {
                        from {
                            opacity: 0;
                            transform: translateY(20px);
                        }
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    .form-wrapper {
                        animation: fadeInUp 0.6s ease-out;
                    }
                </style>

                <div class="form-wrapper font">
                    <!-- Modern Header Section -->
                    <div class="modern-header">
                        <div class="header-content">
                            <div class="header-info">
                                <img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" alt="Organization Logo" />
                                <div class="contact-info">
                                    <span>
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <p class="mb-0">{{ $setting?->address }}</p>
                                    </span>
                                    <span>
                                        <i class="bi bi-telephone-fill"></i>
                                        <p class="mb-0">{{ $setting?->contact_no }}</p>
                                    </span>
                                </div>
                            </div>
                            <div class="member-photo-card">
                                <div class="photo-frame">
                                    <img src='{{asset('uploads/memberImage/'.$show_data->image)}}' class="member-photo" alt="Member Photo">
                                </div>
                                <div class="member-badge">সদস্য নং: {{ str_pad($show_data->member_serial_no,5,"0",STR_PAD_LEFT)}}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Section -->
                    <div class="form-section">
                        <h6 class="section-title">আমার বিবরণ নীচে প্রদত্ত হইলঃ</h6>

                        <table class="details-table">
                            <tbody>
                                <tr>
                                    <th class="row-number">১</th>
                                    <th>নাম</th>
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
                                        <div class="nominee-list">
                                            @foreach ($nomini as $n)
                                                <span>{{$n->name_of_heirs}} ({{$n->relation}})</span>
                                            @endforeach
                                        </div>
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