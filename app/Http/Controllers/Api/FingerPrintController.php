<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\OurMember;
use Illuminate\Http\Request;
use Exception;

class FingerPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msn($token)
    {
        if($token=="HE68Xku985Hk"){
            $member=OurMember::orderBy('member_serial_no')->pluck('member_serial_no');
            $data=array('error'=>'','res'=>$member,'count'=>count($member));
            return response($member, 200);
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPrint($token,$msno)
    {
        if($token=="HE68Xku985Hk"){
            $member=OurMember::where('member_serial_no',$msno)->first();
            if($member){
                if($member->finger_print)
                    $data=array($member->finger_print);
                else
                    $data=array();
            }else{
                $data=array();
            }
            
            return response($data, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePrint($token,Request $r)
    {
        if($token=="HE68Xku985Hk"){
            $msno=$r->msno;
            $finger=$r->finger;
            $member=OurMember::where('member_serial_no',$msno)->first();
            if($member){
                $member->finger_print=$finger;
                $member->save();
                $data=array('Saved');
                return response($data, 200);
            }else{
                $data=array('Member not found.');
                return response($data, 200);
            }
        }
    }

}
