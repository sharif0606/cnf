@extends('frontend.memDashboard.memberApp')
@section('memberContent')
@php
    $status = encryptor('decrypt', request()->session()->get('status'));
    if ($status == 1) {
        $statusText = 'Applied for approval';
    } elseif ($status == 2) {
        $statusText = 'Active';
    }elseif ($status == 3) {
        $statusText = 'Suspended';
    } else {
        $statusText = 'Pending';
    }
@endphp
        
<div class="dashboard">
    <div class="member-service">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm mb-3">
                    <div class="card-header dashboard-scroll text-white">
                        @php $today=\Carbon\Carbon::today()->toDateString(); @endphp
                        <marquee width="98%"  onmouseover="this.stop();" onmouseout="this.start();" direction="left" height="content-fit" class="">
                            <ul class="m-0">
                            @forelse (App\Models\scroll_notice::where('published_date', '<=',$today)->where(function ($query) use ($today) {
                                $query->where('unpublished_date', '>',$today);
                                $query->orWhereNull('unpublished_date');
                            })->latest()->limit(12)->get();  as $scroll)
                        
                            <li style="border-right: 2px solid rgb(254, 253, 253)"><p class="px-2 text-white">{{$scroll->text}}</p></li>

                            @empty
                            
                            @endforelse
                            </ul>
                        </marquee>
                    </div>
                    <div class="card-body" style="min-height:50px;">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th class="text-end"><button class="me-5 btn border-danger text-success">{{$statusText}}</button></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card notice shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Payment Information</h5>
                    </div>
                    <div class="card-body" style="min-height:70px;">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="40">Total Dues</th>
                                <td width="2">:</td>
                                <td width="50">10000.00</td>
                                <td width="8" class="text-end"><a class="btn btn-sm btn-danger" href="#">Pay Now</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card company-info shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body" style="min-height:290px;">
                        @php $mt=array("","Life Member","Permanent Member","Donor Member","Service Member","Temporary Member","Honorary Member","Corporate Member","Diplomate Member");
                            $membershipType = request()->session()->get('membership_type');
                            $decryptedType = encryptor('decrypt', $membershipType);
                            $decryptedValue = $mt[$decryptedType];
                        @endphp
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="40">Name</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('full_name'))}}</td>
                            </tr>
                            <tr>
                                <th width="40">Membership No</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('membership_no'))}}</td>
                            </tr>
                            <tr>
                                <th width="40">Membership Type</th>
                                <td width="2">:</td>
                                <td width="58">{{ $decryptedValue }}</td>
                            </tr>
                            {{-- <tr>
                                <th width="40">Membership Date</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('full_name'))}}</td>
                            </tr> --}}
                            <tr>
                                <th width="40">Contact No</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('phone'))}}</td>
                            </tr>
                            <tr>
                                <th width="40">Email</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('email'))}}</td>
                            </tr>
                            <tr>
                                <th width="40">Address</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('address'))}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card Payment-info shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Payment Info</h5>
                    </div>
                    <div class="card-body" style="min-height:450px;">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="40">Payment Method</th>
                                <td width="2">:</td>
                                <td width="58"></td>
                            </tr>
                            <tr>
                                <th width="40">Payment Status</th>
                                <td width="2">:</td>
                                <td width="58"></td>
                            </tr>
                            <tr>
                                <th width="40">Payment Date</th>
                                <td width="2">:</td>
                                <td width="58"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection