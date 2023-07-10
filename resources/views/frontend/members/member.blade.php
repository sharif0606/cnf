@extends('frontend.members.memberApp')
@section('memberContent')

@php
    $status = encryptor('decrypt', request()->session()->get('status'));
    if ($status == 1) {
        $statusText = 'Applied for approval';
    } elseif ($status == 2) {
        $statusText = 'Approved';
    }elseif ($status == 3) {
        $statusText = 'Suspended';
    } else {
        $statusText = 'Pending';
    }
@endphp
        
<div class="dashboard">
    <div class="member-service">
        <div class="row">
            <div class="col-lg-6">
                <div class="card company-info shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Company Information</h5>
                    </div>
                    <div class="card-body" style="min-height:290px;">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="40">Name</th>
                                <td width="2">:</td>
                                <td width="58">{{encryptor('decrypt', request()->session()->get('full_name'))}}</td>
                            </tr>
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
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card notice shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Applied Status</h5>
                    </div>
                    <div class="card-body" style="min-height:70px;">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="40">Application Status</th>
                                <td width="2">:</td>
                                <td width="58"><p class="badge text-center badge-info">{{ $statusText }}</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card Payment-info shadow-sm mb-3">
                    <div class="card-header">
                        <h5>Payment Info</h5>
                    </div>
                    <div class="card-body" style="min-height:70px;">
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