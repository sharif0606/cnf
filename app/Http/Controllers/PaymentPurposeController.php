<?php

namespace App\Http\Controllers;

use App\Models\Payment_purpose;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class PaymentPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payment_purpose::all();
        return view('paymentPurpose.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paymentPurpose.create');
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
            $b= new Payment_purpose;
            $b->purpose=$request->purpose;
            $b->amount=$request->amount;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.ppurpose.index');
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
     * @param  \App\Models\Payment_purpose  $payment_purpose
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_purpose $payment_purpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment_purpose  $payment_purpose
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purpose= Payment_purpose::findOrFail(encryptor('decrypt',$id));
        return view('paymentPurpose.edit',compact('purpose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment_purpose  $payment_purpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= Payment_purpose::findOrFail(encryptor('decrypt',$id));
            $b->purpose=$request->purpose;
            $b->amount=$request->amount;
            if($b->save()){
                Toastr::success('Update Successfully!');
                return redirect()->route(currentUser().'.ppurpose.index');
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
     * @param  \App\Models\Payment_purpose  $payment_purpose
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= Payment_purpose::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
