<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurMember; // custome

class DashboardController extends Controller
{
    /*
    * admin dashboard
    */
    public function adminDashboard(){
        $appliedMember = OurMember::where('approvedstatus',0)->count();
        $gsApporoveMember = OurMember::where('approvedstatus',1)->count();
        $approveMember = OurMember::where('approvedstatus',2)->count();
        $archiveMember = OurMember::count();
        return view('dasbhoard.admin',compact('appliedMember','gsApporoveMember','approveMember','archiveMember'));
    }

    /*
    * chairman dashboard
    */
    public function chairmanDashboard(){
        return view('dasbhoard.chairman');
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
        return view('dasbhoard.generalsecretary');
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
