<?php

namespace App\Http\Controllers;

use App\Models\OthersPayment;
use App\Models\OthersPaymentDetail;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Carbon\Carbon;

class OthersPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = OthersPayment::query();

        if ($request->filled('fdate')) {
            $tdate = $request->filled('tdate') ? $request->input('tdate') : $request->input('fdate');
            $query->whereBetween('date', [$request->input('fdate'), $tdate]);
        }

        $data = $query->orderBy('id', 'DESC')->paginate(15);
        $totalVouchers = $data->unique('vhoucher_no')->count();
        $totalAmount = $data->sum('total_amount');
        
        return view('othersPayment.index', compact('data', 'totalVouchers', 'totalAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('othersPayment.create');
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
            $fee=new OthersPayment;
            $fee->vhoucher_no='VR-'.Carbon::now()->format('m-y').'-'. str_pad((OthersPayment::whereYear('created_at', Carbon::now()->year)->count() + 1),4,"0",STR_PAD_LEFT);
            $fee->date=date('Y-m-d', strtotime($request->voucher_date));
            $fee->name=$request->member_name;
            $fee->receipt_no=$request->receipt_no;
            $fee->year=$request->year;
            $fee->total_amount=$request->total_fees;
            if($fee->save()){
                if($request->amount){
                    foreach($request->amount as $i=>$amount){
                        if($amount > 0){
                            $mc=new OthersPaymentDetail;
                            $mc->others_payments_id=$fee->id;
                            $mc->code=$request->code[$i];
                            $mc->name=$request->fee_name[$i];
                            $mc->amount=$request->amount[$i];
                            $mc->save();
                        }
                    }
                }
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.othersPay.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
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
     * @param  \App\Models\OthersPayment  $othersPayment
     * @return \Illuminate\Http\Response
     */
    public function show(OthersPayment $othersPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OthersPayment  $othersPayment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otherCollection = OthersPayment::findOrFail(encryptor('decrypt',$id));
        $collectionDetail = OthersPaymentDetail::where('others_payments_id',$otherCollection->id)->get();
        return view('othersPayment.edit',compact('otherCollection','collectionDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OthersPayment  $othersPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $fee= OthersPayment::findOrFail(encryptor('decrypt',$id));
            $fee->date=date('Y-m-d', strtotime($request->voucher_date));
            $fee->name=$request->member_name;
            $fee->receipt_no=$request->receipt_no;
            $fee->year=$request->year;
            $fee->total_amount=$request->total_fees;
            if($fee->save()){
                if($request->amount){
                    OthersPaymentDetail::where('others_payments_id',$fee->id)->delete();
                    foreach($request->amount as $i=>$amount){
                        if($amount > 0){
                            $mc=new OthersPaymentDetail;
                            $mc->others_payments_id=$fee->id;
                            $mc->code=$request->code[$i];
                            $mc->name=$request->fee_name[$i];
                            $mc->amount=$request->amount[$i];
                            $mc->save();
                        }
                    }
                }
            }
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.othersPay.index');
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
     * @param  \App\Models\OthersPayment  $othersPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OthersPayment $othersPayment)
    {
        //
    }
}
