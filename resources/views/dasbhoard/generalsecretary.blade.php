@extends('layout.app')
@section('pageTitle',trans('Dashboard'))

@section('content')

<div class="page-content py-3">
    <section class="row">
        <div class="col-12">
            <div class="row float-end">
                <div class="col-12 d-flex">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text bg-info text-white" id="inputGroup-sizing-sm">SMS Balance</span>
                        <input type="text" value="{{money_format($smsLeft)}}" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
        </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                <i class="bi bi-calendar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Today Applied Member</span><br>
                    <span class="info-box-number" style="font-size: 2rem;">{{$todadyApplied}}</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow">
                    <i class="bi bi-calendar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Today Approved Member</span><br>
                    <span class="info-box-number" style="font-size: 2rem;">{{$todayApproveMember}}</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Today Pay Amount</span><br>
                    <span class="info-box-number" style="font-size: 1.5rem;">৳  {{money_format($todayPay + $othersPay)}}</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <i class="bi bi-calendar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Last RSL Number</span><br>
                    <span class="info-box-number" style="font-size: 2rem;">{{$lastRslNo}}</span>
                </div>
            </div>
       </div>
    </section>
    {{-- <section class="row">
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                <i class="bi bi-bag icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Todays Total Purchase</span>
                    <span class="info-box-number">৳  0.00</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Today Payment Received(Sales)</span>
                    <span class="info-box-number">৳  0.00</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                <i class="bi bi-cart icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Todays Total Sales</span>
                    <span class="info-box-number">৳  0.00</span>
                </div>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                <i class="bi bi-dash-square icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Todays Total Expense</span>
                    <span class="info-box-number">৳  0.00</span>
                </div>
            </div>
       </div>
    </section> --}}
    <section class="row">
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-pink">
               <div class="inner text-uppercase">
                    <h3>{{$appliedMember}}</h3>
                    <p>Total Applied Member</p>
               </div> 
               <div class="icon">
                <i class="bi bi-people-fill"></i>
               </div>
               <a href="{{route(currentUser().'.ourMember.index')}}" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-purple">
               <div class="inner text-uppercase">
                    <h3>{{$gsApporoveMember}}</h3>
                    <p>GS Approved Member</p>
               </div> 
               <div class="icon">
                <i class="bi bi-people-fill"></i>
               </div>
               <a href="{{route(currentUser().'.gs_approve_member')}}" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-maroon">
               <div class="inner text-uppercase">
                    <h3>{{$approveMember}}</h3>
                    <p>Total Approved Member</p>
               </div> 
               <div class="icon">
                <i class="bi bi-people-fill"></i>
               </div>
               <a href="{{route(currentUser().'.approve_member')}}" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-green">
               <div class="inner text-uppercase">
                    <h3>{{$archiveMember}}</h3>
                    <p>Total Archive Member</p>
               </div> 
               <div class="icon">
                <i class="bi bi-people-fill"></i>
               </div>
               <a href="{{route(currentUser().'.archive_member')}}" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
    </section>
</div>
@endsection

@push('scripts')

<!-- Need: Apexcharts -->
<script src="{{ asset('/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/dashboard.js') }}"></script>
@endpush