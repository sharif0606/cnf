<?php

namespace App\Http\Controllers;

use App\Models\total_due;
use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class TotalDueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = total_due::paginate(10);
        return view('tdue.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ourmember=OurMember::select('given_name','surname','membership_no','membership_applied','id')->where('status',2)->get();
        return view('tdue.create',compact('ourmember'));
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
            $tag=new total_due;

            $tag->member_type=$request->member_type;
            $tag->member_id=$request->member_id;
            $tag->status=$request->status;
            $tag->y2016=$request->y2016;
            $tag->y2017=$request->y2017;
            $tag->y2018=$request->y2018;
            $tag->y2019=$request->y2019;
            $tag->y2020=$request->y2020;
            $tag->y2021=$request->y2021;
            $tag->y2022=$request->y2022;
            $tag->y2022=$request->y2022;
            $tag->y2023=$request->y2023;
            $tag->y2024=$request->y2024;
            $tag->subscription_interest=$request->subscription_interest;
            $tag->land_interest=$request->land_interest;
            $tag->land_developmnet_fee=$request->land_developmnet_fee;

            if($tag->save()){
            Toastr::success('Created Successfully!');
            return redirect()->route(currentUser().'.tdue.index');
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
     * @param  \App\Models\total_due  $total_due
     * @return \Illuminate\Http\Response
     */
    public function show(total_due $total_due)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\total_due  $total_due
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourmember=OurMember::select('given_name','surname','membership_no','membership_applied','id')->where('status',2)->get();
        $tdue = total_due::findOrFail(encryptor('decrypt',$id));
        return view('tdue.edit',compact('tdue','ourmember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\total_due  $total_due
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $tag= total_due::findOrFail(encryptor('decrypt',$id));

            $tag->member_type=$request->member_type;
            $tag->member_id=$request->member_id;
            $tag->status=$request->status;
            $tag->y2016=$request->y2016;
            $tag->y2017=$request->y2017;
            $tag->y2018=$request->y2018;
            $tag->y2019=$request->y2019;
            $tag->y2020=$request->y2020;
            $tag->y2021=$request->y2021;
            $tag->y2022=$request->y2022;
            $tag->y2022=$request->y2022;
            $tag->y2023=$request->y2023;
            $tag->y2024=$request->y2024;
            $tag->subscription_interest=$request->subscription_interest;
            $tag->land_interest=$request->land_interest;
            $tag->land_developmnet_fee=$request->land_developmnet_fee;

            if($tag->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.tdue.index');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\total_due  $total_due
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= total_due::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Data Deleted');
        return redirect()->back();
    }
}
