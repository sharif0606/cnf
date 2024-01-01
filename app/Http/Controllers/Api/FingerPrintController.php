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
    public function msn()
    {
        $member=OurMember::pluck('member_serial_no');
        $data=array('error'=>'','res'=>$member);
        return response($member, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPrint($msno)
    {
        $member=OurMember::where('member_serial_no',$msno)->first();
        if($member){
            if($member->finger_print)
                $data=array('error'=>'','res'=>$member->finger_print);
            else
                $data=array('error'=>'Finget Print not found.','res'=>'');
        }else{
            $data=array('error'=>'Member not found.','res'=>'');
        }
        
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePrint(Request $r)
    {
        $msno=$r->msno;
        $finger=$r->finger;
        $member=OurMember::where('member_serial_no',$msno)->first();
        if($member){
            $member->finger_print=$finger;
            $member->save();
            $data=array('res'=>'Saved');
            return response($data, 200);
        }else{
            $data=array('error'=>'Member not found.','res'=>'');
            return response($data, 200);
        }
    }

}
