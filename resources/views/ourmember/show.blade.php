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
            border-spacing:0 40px;
            }

        .gfg3 {
            border-collapse:separate;
            border-spacing:0 25px;
        }

        .gfg4 {
            border-collapse:separate;
            border-spacing:0 15px;
        }
        .dtable,td, th{

            border-collapse: collapse;
        }

        .photo{

            margin: auto;
            padding-top: 3rem;


        }
        .pdiv{
            position: relative;
            background-color: rgba(53, 123, 189, 0.6);
            padding: 20px 12px 20px 12px;


        }
        .pbox{
            width: 120px;
            height: 134px;
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
        <a href="#" class="btn no-print"> Go To Dashboard</a>
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
            <table class = "gfg" style="margin-bottom: 5rem; width:100%">
                <tbody >
                    <tr>
                        <th style="text-align: center;">
                            <h4 style="margin: 0;">ফরম-৫৫ (ক)</h4>
                            <h4 style="margin: 4px;">[ধারা ১৭৯ (১) (গ) এবং বিধি ১৬৭ (১) দ্রষ্টব্য]</h4>
                            <h4 style="margin: 4px;">প্রতিষ্ঠান/ প্রতিষ্ঠানপুঞ্জের শ্রমিক বা কর্মচারী বা মালিকের ট্রেড ইউনিয়নের সদস্য হইবার আবেদন ফরম</h4>
                        </th>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
