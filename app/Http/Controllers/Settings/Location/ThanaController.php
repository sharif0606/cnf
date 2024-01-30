<?php

namespace App\Http\Controllers\Settings\Location;

use App\Http\Controllers\Controller;

use App\Models\Settings\Location\Thana;
use App\Models\Settings\Location\Upazila;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use App\Classes\sslSms;
use App\Models\OurMember;

use Exception;

class ThanaController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $members=OurMember::where('approvedstatus',2)->where('sms_send',0)->limit(100)->get();
        // foreach($members as $member){
        //     if($member->sms_send !=1 ){ /** check member sms send before or not */
        //         $smsClass= new sslSms();
        //         if($member->personal_phone){
        //             $phone=$member->personal_phone;
        //             $rand=uniqid().rand(1000,9999);
        //             $msg_text="ডিজিটাল পদ্ধতিতে নবায়ন করায় সিবিএ - ২৩৪ এর কার্যনির্বাহী পরিষদ এর পক্ষথেকে আপনাকে ধন্যবাদ।\nMember No: ".$member->member_serial_no."/".$member->member_serial_no_new."\nRSL: ".$member->renew_serial_no."\nকৃতজ্ঞতায় সাধারণ সম্পাদক / সভাপতি\nওয়েবসাইট: https://www.cnfemployeesunion.com";
        //             $smssend=$smsClass->singleSms($phone, $msg_text, $rand);
        //             if($smssend->status_code=="200"){
        //                 /* update member sms send status */
        //                 $member->sms_send=1;
        //                 $member->save();
        //                 echo $member->id.$msg_text."<br>";
        //             }else{
        //                 print_r($smssend);
        //             }
        //         }
        //     }
        // }

        $thanas=Thana::all();
        return view('settings.location.thana.index',compact('thanas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $upazilas=Upazila::all();
        return view('settings.location.thana.create',compact('upazilas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $thana=new Thana;
            $thana->upazila_id=$request->upazila_id;
            $thana->name=$request->thanaName;
            $thana->name_bn=$request->thanaBn;
            if($thana->save())
                return redirect()->route(currentUser().'.thana.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','please try again'));    
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\Location\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function show(Thana $thana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\Location\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function edit($thana)
    {
        $upazilas=Upazila::all();
        $thana= Thana::findOrFail(encryptor('decrypt',$thana));
        return view('settings.location.thana.edit',compact('thana','upazilas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\Location\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $thana)
    {
        try{
            $thana= Thana::findOrFail(encryptor('decrypt',$thana));
            $thana->upazila_id=$request->upazila_id;
            $thana->name=$request->thanaName;
            $thana->name_bn=$request->thanaBn;
            if($thana->save())
                return redirect()->route(currentUser().'.thana.index')->with($this->resMessageHtml(true,null,'Successfully update'));
                else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\Location\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thana $thana)
    {
        //
    }
}
