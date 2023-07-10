<?php

namespace App\Http\Controllers;

use App\Models\Banklist;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class BanklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Banklist::paginate(10);
        return view('bank.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
            $b=new Banklist;
            $b->name_of_bank=$request->name_of_bank;
            $b->branch_name=$request->branch_name;
            $b->account_number=$request->account_number;
            $b->routing_number=$request->routing_number;
            $b->account_name=$request->account_name;

            if($request->hasFile('logo')){
                $data = rand(111,999).time().'.'.$request->logo->extension();
                $request->logo->move(public_path('uploads/bankLogo'), $data);
                $b->logo=$data;
            }
            if($b->save()){
                Toastr::success('Create Successfully!');
                return redirect()->route(currentUser().'.bank.index');
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
     * @param  \App\Models\Banklist  $banklist
     * @return \Illuminate\Http\Response
     */
    public function show(Banklist $banklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banklist  $banklist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banklist = Banklist::findOrFail(encryptor('decrypt' ,$id));
        return view('bank.edit',compact('banklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banklist  $banklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= Banklist::findOrFail(encryptor('decrypt' ,$id));
            $b->name_of_bank=$request->name_of_bank;
            $b->branch_name=$request->branch_name;
            $b->account_number=$request->account_number;
            $b->routing_number=$request->routing_number;
            $b->account_name=$request->account_name;

            if($request->hasFile('logo')){
                $data = rand(111,999).time().'.'.$request->logo->extension();
                $request->logo->move(public_path('uploads/bankLogo'), $data);
                $b->logo=$data;
            }
            if($b->save()){
                Toastr::success('Update Successfully!');
                return redirect()->route(currentUser().'.bank.index');
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
     * @param  \App\Models\Banklist  $banklist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Banklist::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Deleted Permanently!');
        return redirect()->back();
    }
}
