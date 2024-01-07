<?php

namespace App\Http\Controllers;

use App\Models\fee_collection;
use App\Models\fee_collection_detail;
use App\Models\OurMember;
use App\Models\Payment_purpose;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Carbon\Carbon;

class FeeCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = fee_collection::all();
        return view('feesCollection.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = Payment_purpose::all();
        return view('feesCollection.create',compact('fees'));
    }

    public function getMember(Request $request)
    {
        $member_serial_no = $request->input('member_serial_no');
        $member = OurMember::where('member_serial_no', $member_serial_no)->first();
        return response()->json(['member' => $member]);
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
            $fee=new fee_collection;
            $fee->member_id=$request->member_id;
            $fee->vhoucher_no='VR-'.Carbon::now()->format('m-y').'-'. str_pad((fee_collection::whereYear('created_at', Carbon::now()->year)->count() + 1),4,"0",STR_PAD_LEFT);
            $fee->date=$request->voucher_date;
            $fee->national_id=$request->nid;
            $fee->name=$request->member_name;
            $fee->receipt_no=$request->receipt_no;
            $fee->year=$request->year;
            $fee->total_amount=$request->total_fees;
            if($fee->save()){
                if($request->amount){
                    foreach($request->amount as $i=>$amount){
                        if($amount > 0){
                            $mc=new fee_collection_detail;
                            $mc->fee_collections_id=$fee->id;
                            $mc->fee_id=$request->fee_id[$i];
                            $mc->code=$request->code[$i];
                            $mc->name=$request->fee_name[$i];
                            $mc->amount=$request->amount[$i];
                            $mc->save();
                        }
                    }
                }
                
                $msln_renew=OurMember::find($request->member_id);
                $msln_renew->renew_serial_no=OurMember::max('renew_serial_no')+1;
                $msln_renew->save();

                Toastr::success('Create Successfully!');
                return redirect()->route(currentUser().'.feeCollection.index');
            }
            
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fee_collection  $fee_collection
     * @return \Illuminate\Http\Response
     */
    public function show(fee_collection $fee_collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fee_collection  $fee_collection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeDetails = fee_collection::findOrFail(encryptor('decrypt',$id));
        $fees = Payment_purpose::all();
        $feeCollectionDetails = fee_collection_detail::where('fee_collections_id',$feeDetails->id)->pluck('amount','fee_id');
        return view('feesCollection.edit',compact('feeDetails','feeCollectionDetails','fees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fee_collection  $fee_collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $fee= fee_collection::findOrFail(encryptor('decrypt',$id));
            $fee->member_id=$request->member_id;
            $fee->date=$request->voucher_date;
            $fee->national_id=$request->nid;
            $fee->name=$request->member_name;
            $fee->receipt_no=$request->receipt_no;
            $fee->year=$request->year;
            $fee->total_amount=$request->total_fees;
            if($fee->save()){
                if($request->amount){
                    fee_collection_detail::where('fee_collections_id',$fee->id)->delete();
                    foreach($request->amount as $i=>$amount){
                        if($amount > 0){
                            $mc=new fee_collection_detail;
                            $mc->fee_collections_id=$fee->id;
                            $mc->fee_id=$request->fee_id[$i];
                            $mc->code=$request->code[$i];
                            $mc->name=$request->fee_name[$i];
                            $mc->amount=$request->amount[$i];
                            $mc->save();
                        }
                    }
                }
            }
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.feeCollection.index');
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fee_collection  $fee_collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(fee_collection $fee_collection)
    {
        //
    }
}
