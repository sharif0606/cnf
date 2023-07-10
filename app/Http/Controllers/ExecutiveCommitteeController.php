<?php

namespace App\Http\Controllers;

use App\Models\executive_committee;
use App\Models\founding_committee;
use App\Models\committee_session;
use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use DB;

class ExecutiveCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = executive_committee::paginate(12);
        return view('executiveCommittee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ourMember = DB::table('our_members')
                ->join('founding_committees', 'our_members.membership_no', '=', 'founding_committees.member_id')
                ->select('our_members.*')
                ->get();
        //$ourMember= OurMember::where('status', 2)->get();
        $comSession = committee_session::all();
        return view('executiveCommittee.create',compact('comSession','ourMember'));
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
            $b= new executive_committee;
            $b->member_id=$request->member_id;
            $b->committee_sessions_id=$request->session_id;
            $b->designation=$request->designation;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.exeCommittee.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\executive_committee  $executive_committee
     * @return \Illuminate\Http\Response
     */
    public function show(executive_committee $executive_committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\executive_committee  $executive_committee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourMember = DB::table('our_members')
                ->join('founding_committees', 'our_members.membership_no', '=', 'founding_committees.member_id')
                ->select('our_members.*')
                ->get();
        //$ourMember= OurMember::where('status', 2)->get();
        $comSession = committee_session::all();
        $exeCommittee = executive_committee::findOrFail(encryptor('decrypt',$id));
        return view('executiveCommittee.edit',compact('comSession','ourMember','exeCommittee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\executive_committee  $executive_committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= executive_committee::findOrFail(encryptor('decrypt',$id));
            $b->member_id=$request->member_id;
            $b->committee_sessions_id=$request->session_id;
            $b->designation=$request->designation;
            if($b->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.exeCommittee.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\executive_committee  $executive_committee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= executive_committee::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
