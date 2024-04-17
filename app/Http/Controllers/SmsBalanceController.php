<?php

namespace App\Http\Controllers;

use App\Classes\sslSms;
use App\Models\SmsBalance;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use App\Models\OurMember;
use App\Models\setting;
use Exception;
use Illuminate\Support\Facades\Log;

class SmsBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function get_sms_panel()
    {
        return view('smsPanel.sendSms');
    }

    public function sendSms(Request $request)
    {
        try {
            $memberIds = explode(',', $request->input('member_id'));
            $success=$error="";
            $members = OurMember::whereIn('member_serial_no', $memberIds)->get();
            foreach ($members as $member) {
                if($member){
                    if((currentUser() == 'chairman') || (currentUser() == 'generalsecretary')) {
                        $smsClass = new sslSms();
                        $phone = $member->personal_phone;
                        $rand = uniqid() . rand(1000, 9999);
                        $password = rand(111111, 999999);
                        $msg_text="ডিজিটাল পদ্ধতিতে নবায়ন করায় সিবিএ - ২৩৪ এর কার্যনির্বাহী পরিষদ এর পক্ষথেকে আপনাকে ধন্যবাদ।\nMember No: ".$member->member_serial_no."/".$member->member_serial_no_new."\nRSL: ".$member->renew_serial_no."\nPassword:".$password."\nওয়েবসাইট: https://cnfemployeesunion.com\n\nকৃতজ্ঞতায়\nসভাপতি: মো: খায়রুল বাশার মিল্টন\nসাধারণ সম্পাদক: মো: মোশাররফ হোসেন ভূঁইয়া";
    
                        $checksendsms=$smsClass->singleSms($phone, $msg_text, $rand);
                        //Log::info($checksendsms->status_code.'-'.$phone);
                        if ($checksendsms->status_code == "200") {
                            $member->sms_send = 1;
                            $member->profile_view_password = $password;
                            $member->save(); 
    
                            $settingTable = setting::find(1);
                            $settingTable->number_of_send_sms++;
                            $settingTable->save();
                            $success.=$member->member_serial_no;
                        } else {
                            $error.=$member->member_serial_no;
                        }
                    }
                }else {
                    $error.=$member->member_serial_no;
                }
            }
            
            Toastr::success("Sms Send Successfully to $success and fail to $error");
            return redirect()->route(currentUser().'.get_sms_page');
        } catch (\Exception $e) {
            //dd($e);
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmsBalance  $smsBalance
     * @return \Illuminate\Http\Response
     */
    public function show(SmsBalance $smsBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsBalance  $smsBalance
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsBalance $smsBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmsBalance  $smsBalance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsBalance $smsBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmsBalance  $smsBalance
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsBalance $smsBalance)
    {
        //
    }
}
