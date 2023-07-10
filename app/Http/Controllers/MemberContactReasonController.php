<?php

namespace App\Http\Controllers;

use App\Models\member_contact_reason;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class MemberContactReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = member_contact_reason::all();
        return view('memberContactReason.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberContactReason.create');
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
            $b= new member_contact_reason;
            $b->reason=$request->reason;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.mcreason.index');
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
     * @param  \App\Models\member_contact_reason  $member_contact_reason
     * @return \Illuminate\Http\Response
     */
    public function show(member_contact_reason $member_contact_reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member_contact_reason  $member_contact_reason
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conReason=member_contact_reason::findOrFail(encryptor('decrypt',$id));
        return view('memberContactReason.edit',compact('conReason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member_contact_reason  $member_contact_reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= member_contact_reason::findOrFail(encryptor('decrypt',$id));
            $b->reason=$request->reason;
            if($b->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.mcreason.index');
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
     * @param  \App\Models\member_contact_reason  $member_contact_reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= member_contact_reason::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
