<?php

namespace App\Http\Controllers;

use App\Models\contact_reason;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;


class ContactReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = contact_reason::all();
        return view('contactReason.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactReason.create');
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
            $b= new contact_reason;
            $b->reason=$request->reason;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.creason.index');
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
     * @param  \App\Models\contact_reason  $contact_reason
     * @return \Illuminate\Http\Response
     */
    public function show(contact_reason $contact_reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact_reason  $contact_reason
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conReason=contact_reason::findOrFail(encryptor('decrypt',$id));
        return view('contactReason.edit',compact('conReason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact_reason  $contact_reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $b= contact_reason::findOrFail(encryptor('decrypt',$id));
            $b->reason=$request->reason;
            if($b->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.creason.index');
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
     * @param  \App\Models\contact_reason  $contact_reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= contact_reason::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
