<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        @font-face {
            font-family: 'Kalpurush';
            src: url('{{ asset("fonts/Kalpurush.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            body * {
                visibility: hidden;
            }
            .card-container,
            .card-container * {
                visibility: visible;
            }
            .card-container {
                position: absolute;
                left: 0;
                top: 0;
                margin: 0;
                page-break-inside: avoid;
            }
            .no-print {
                display: none !important;
            }
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Kalpurush', 'SolaimanLipi', Arial, sans-serif;
            background: #e0e0e0;
            padding: 20px;
        }
        
        .print-button {
            margin-bottom: 20px;
            text-align: center;
        }
        
        .print-button button {
            padding: 12px 30px;
            background: linear-gradient(135deg, #006d3b, #00a854);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 109, 59, 0.3);
            transition: all 0.3s ease;
        }
        
        .print-button button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 109, 59, 0.4);
        }
        
        .print-button .pdf-button {
            background: linear-gradient(135deg, #d32f2f, #e57373);
            margin-left: 10px;
        }
        
        .print-button .pdf-button:hover {
            box-shadow: 0 6px 20px rgba(211, 47, 47, 0.4);
        }
        
        .cards-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-start;
        }
        
        /* Card container with background image */
        .card-container {
            width: 64mm;
            height: 100.6mm;
            background-image: url('{{ asset("img/id-card.png") }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            page-break-inside: avoid;
            border-radius: 8px;
            overflow: hidden;
        }
        
        /* Photo and QR section - positioned in the white area */
        .photo-qr-section {
            position: absolute;
            top: 122px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            padding: 0 9px 0 12px;
        }
        
        /* Member photo */
        .member-photo-wrapper {
            border:1px solid #2e3192;
            width: 83px;
            height: 95px;
            overflow: hidden;
            background: #f5f5f5;
        }
        
        .member-photo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* QR Code and IDs section */
        .qr-id-section {
            position: relative;
            top: -27px;
            text-align: right;
            width:130px;
        }
        
        .qr-code {
            width: 53px;
            height: 53px;
            background: transparent;
            margin-left: auto;
        }
        
        .qr-code img {
            width: 100%;
            height: 100%;
            border:1px solid #ffffff;
        }
        
        .member-ids {
            text-align: left;
            padding-top: 6px;
        }
        
        .member-id-row {
            font-size: 12px;
            font-weight: 700;
            color: #000;
            margin-bottom: 3px;
        }
        
        .member-id-row span {
            color: #000;
        }
        
        .nid-number {
            display: inline-block;
            max-width: 85px;
            word-wrap: break-word;
            word-break: break-all;
            vertical-align: top;
        }

        .font-x{
            font-size: 16px;
        }
        
        /* Member name section */
        .member-name-section {
            position: absolute;
            top: 215px;
            left: 0;
            right: 0;
            text-align: center;
            padding: 0 10px;
        }
        
        .member-name {
            font-size: 17px;
            font-weight: 700;
            color: #2e3192;
        }
        
        .member-nickname {
            color: #c41e3a;
            font-weight: 700;
        }
        
        /* Member details section */
        .member-details {
            position: absolute;
            top: 240px;
            left: 0;
            right: 0;
            padding: 0 15px;
            font-size: 12px;
            line-height: 1.2;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 2px;
        }
        
        .detail-label {
            color: #000;
            min-width: 90%;
            text-align: center;
        }
        
        .detail-colon {
            margin: 0 4px;
            font-weight: 700;
            color: #006d3b;
        }
        
        .detail-value {
            color: #000;
            font-weight: 600;
            flex: 1;
        }

        .bold-text {
            font-weight: bold;
            color: #000;
        }
        .margin-bottom-0{
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="print-button no-print">
        <button onclick="window.print()">🖨️ প্রিন্ট আইডি কার্ড</button>
        <button class="pdf-button" onclick="downloadPDF()">📄 ডাউনলোড PDF</button>
    </div>
    @php
        function englishToBangla($number) {
                        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        $banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                        return str_replace($englishDigits, $banglaDigits, $number);
                    }
                    
        $bloodGroupBangla=['A+'=>'এ+ (পজেটিভ)',
                            'A-'=>'এ- (নেগেটিভ)', 
                            'B+'=>'বি+ (পজেটিভ)', 
                            'B-'=>'বি- (নেগেটিভ)', 
                            'O+'=>'ও+ (পজেটিভ)', 
                            'O-'=>'ও- (নেগেটিভ)', 
                            'AB+'=>'এবি+ (পজেটিভ)', 
                            'AB-'=>'এবি- (নেগেটিভ)'];

    @endphp
    <div class="cards-wrapper">
        @php
            $members = isset($ourmember) && $ourmember->count() > 0 ? $ourmember : (isset($member) ? collect([$member]) : collect([]));
        @endphp
        
        @foreach($members as $m)
            @php
                // Generate QR code URL using free API
                $qrData = url('/qrxxy55968ccnf/member/' . encryptor('encrypt', $m->id));
                $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($qrData);
                
                // Convert English numbers to Bangla
                
                
                $memberSerialNo = $m->member_serial_no_new ?? $m->member_serial_no ?? '-';
                $memberSerialNoBangla = englishToBangla($memberSerialNo);
                
                $nidNumber = $m->nid ?? '-';
                $nidNumberBangla = englishToBangla($nidNumber);
            @endphp
            
            <div class="card-container">
                <!-- Photo and QR Code Section -->
                <div class="photo-qr-section">
                    <div class="member-photo-wrapper">
                        @if($m->image)
                            <img src="{{ asset('uploads/memberImage/'.$m->image) }}" 
                                 alt="Member Photo"
                                 onerror="this.onerror=null;this.src='{{ asset('image/noimage.jpg') }}';">
                        @else
                            <img src="{{ asset('image/noimage.jpg') }}" alt="No Photo">
                        @endif
                    </div>
                    
                    <div class="qr-id-section">
                        <div class="qr-code">
                            <img src="{{ $qrCodeUrl }}" alt="QR Code">
                        </div>
                        <div class="member-ids">
                            <div class="member-id-row margin-bottom-0 font-x">সদস্য নং- {{ $memberSerialNoBangla }}</div>
                            <div class="member-id-row">NID নং : <span class="nid-number">{{ $nidNumberBangla }}</span></div>
                        </div>
                    </div>
                </div>
                
                <!-- Member Name -->
                <div class="member-name-section">
                    <div class="member-name">
                        {{ $m->name_bn ?? $m->name_en ?? 'N/A' }}
                        @if($m->others_designation)
                            <span class="member-nickname">({{ $m->others_designation }})</span>
                        @endif
                    </div>
                </div>
                
                <!-- Member Details -->
                <div class="member-details">
                    <div class="detail-row">
                        <span class="detail-label">পিতা : {{ $m->father_name ?? 'N/A' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">মাতা : {{ $m->mother_name ?? 'N/A' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label  bold-text">প্রতিষ্ঠানের নাম : {{ Str::limit($m->designation_of_present_job ?? 'N/A', 22) }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label bold-text"> সি এন্ড এফ এমপ্লয়ী</span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="detail-label">ব্লাড গ্রুপ : {{ $bloodGroupBangla[$m->blood_group] ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <script>
        function downloadPDF() {
            const element = document.querySelector('.cards-wrapper');
            const opt = {
                margin: [5, 5, 5, 5],
                filename: 'member-id-cards-{{ date("Y-m-d-His") }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { 
                    scale: 3,
                    useCORS: true,
                    logging: false,
                    letterRendering: true
                },
                jsPDF: { 
                    unit: 'mm', 
                    format: 'a4', 
                    orientation: 'landscape' 
                },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };
            
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
