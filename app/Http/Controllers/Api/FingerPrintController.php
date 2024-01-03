<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\OurMember;
use Illuminate\Http\Request;
use Exception;
use Log;

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
            return response($member, 200);
        }else{
            $data="";
            return response($data, 200);
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPrint($token,$msno)
    {
        $data="";
        if($token=="HE68Xku985Hk"){
            $member=OurMember::where('member_serial_no',$msno)->first();
            if($member)
                if($member->finger_print)
                    $data=$member->finger_print;
        }
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function storePrint($token,$msno,Request $r)
    {
        $data='Member not found.';
        $copy = json_decode(file_get_contents('php://input'), true);
        if($token=="HE68Xku985Hk"){
            $member=OurMember::where('member_serial_no',$msno)->first();
            if($member){
                $member->finger_print=$copy;
                $member->save();
                $data='Saved';
            }
        }

        return response($data, 200);
    }

}
