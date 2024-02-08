<?php

namespace App\Http\Controllers;

use App\Models\fee_collection;
use Illuminate\Http\Request;
use App\Models\OurMember; // custome
use App\Models\setting;
use App\Models\SmsBalance;
use DateTime;

class DashboardController extends Controller
{
    /*
    * admin dashboard
    */
    public function adminDashboard(){
        $ldate = new DateTime('today');
        $todadyApplied = OurMember::whereDate('created_at', $ldate->format('Y-m-d'))->count();
        $appliedMember = OurMember::where('approvedstatus',0)->where('status', 1)->count();
        $gsApporoveMember = OurMember::where('approvedstatus',1)->count();
        $approveMember = OurMember::where('approvedstatus',2)->count();
        $archiveMember = OurMember::whereIn('status',[0,1,2,3,4])->count();
        $todayPay = fee_collection::whereDate('date', $ldate->format('Y-m-d'))->sum('total_amount');
        $todayApproveMember = OurMember::whereDate('member_approval_date', $ldate->format('Y-m-d'))->count();
        $lastRslNo = OurMember::max('renew_serial_no');
        return view('dasbhoard.admin',compact('todadyApplied','appliedMember','gsApporoveMember','approveMember','archiveMember','todayPay','lastRslNo','todayApproveMember'));
    }

    /*
    * chairman dashboard
    */
    public function chairmanDashboard(){
        $ldate = new DateTime('today');
        $todadyApplied = OurMember::whereDate('created_at', $ldate->format('Y-m-d'))->count();
        $appliedMember = OurMember::where('approvedstatus',0)->where('status', 1)->count();
        $gsApporoveMember = OurMember::where('approvedstatus',1)->count();
        $approveMember = OurMember::where('approvedstatus',2)->count();
        $archiveMember = OurMember::whereIn('status',[0,1,2,3,4])->count();
        $todayPay = fee_collection::whereDate('date', $ldate->format('Y-m-d'))->sum('total_amount');
        $smsCount = SmsBalance::sum('number_of_sms');
        $sendSms = setting::where('id',1)->first();
        $smsLeft = ($smsCount - $sendSms->number_of_send_sms);
        $todayApproveMember = OurMember::whereDate('member_approval_date', $ldate->format('Y-m-d'))->count();
        $lastRslNo = OurMember::max('renew_serial_no');
        return view('dasbhoard.chairman',compact('todadyApplied','appliedMember','gsApporoveMember','approveMember','archiveMember','todayPay','lastRslNo','todayApproveMember','smsLeft'));
    }
    
    /*
    * sales manager dashboard
    */
    public function salesmanagerDashboard(){
        return view('dasbhoard.salesmanager');
    }

    /*
    * sales man dashboard
    */
    public function generalsecretaryDashboard(){
        $ldate = new DateTime('today');
        $todadyApplied = OurMember::whereDate('created_at', $ldate->format('Y-m-d'))->count();
        $appliedMember = OurMember::where('approvedstatus',0)->where('status', 1)->count();
        $gsApporoveMember = OurMember::where('approvedstatus',1)->count();
        $approveMember = OurMember::where('approvedstatus',2)->count();
        $archiveMember = OurMember::whereIn('status',[0,1,2,3,4])->count();
        $todayPay = fee_collection::whereDate('date', $ldate->format('Y-m-d'))->sum('total_amount');
        $todayApproveMember = OurMember::whereDate('member_approval_date', $ldate->format('Y-m-d'))->count();
        $lastRslNo = OurMember::max('renew_serial_no');
        return view('dasbhoard.generalsecretary',compact('todadyApplied','appliedMember','gsApporoveMember','approveMember','archiveMember','todayPay','lastRslNo','todayApproveMember'));
    }
    /*
    * member dashboard
    */
    public function memberDashboard(){
        $user=OurMember::findOrFail(currentUserId());
        if (in_array($user->status, [2,3])) {
            return redirect()->back();
        }
        return view('frontend.members.member');
    }
    /*
    * member dashboard
    */
    public function memDashboard(){
        return view('frontend.memDashboard.member');
    }
}
