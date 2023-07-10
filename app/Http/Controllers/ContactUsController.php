<?php

namespace App\Http\Controllers;

use App\Models\contact_us;
use App\Models\contact_reason;
use Illuminate\Http\Request;
use App\Http\Requests\contact\AddNewRequest;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = contact_us::paginate(10);
        return view('contactUs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // return view('frontend.membership.contact',compact('contactReason'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $b= new contact_us;
            $b->contact_reason_id=$request->lookingfor;
            $b->name=$request->name;
            $b->email=$request->email;
            $b->mobile=$request->PhoneNumber;
            $b->message=$request->message;
            if($b->save()){
                return redirect()->back()->withFragment('#contact_us')->with('success','Submited Successfully!');;
            }else{
                return redirect()->back()->withFragment('#contact_us')->with('error','Please try Again!')->withInput();
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
     * @param  \App\Models\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function show(contact_us $contact_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=contact_us::findOrFail(encryptor('decrypt',$id));
        return view('contactUs.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= contact_us::findOrFail(encryptor('decrypt',$id));
            $b->contact_reason_id=$request->reason;
            $b->name=$request->name;
            $b->email=$request->email;
            $b->mobile=$request->mobile;
            $b->message=$request->message;
            if($b->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.contact.index');
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
     * @param  \App\Models\contact_us  $contact_us
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= contact_us::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
