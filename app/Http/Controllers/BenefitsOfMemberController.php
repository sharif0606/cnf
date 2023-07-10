<?php

namespace App\Http\Controllers;

use App\Models\BenefitsOfMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class BenefitsOfMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefit=BenefitsOfMember::paginate(10);
        return view('Benefit.index',compact('benefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Benefit.create');
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
            $b=new BenefitsOfMember;
            $b->benefit=$request->benefit;
            $b->description=$request->description;
            if($b->save()){
                Toastr::success('Benefits Create Successfully!');
                return redirect()->route(currentUser().'.benefit.index');
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
     * @param  \App\Models\BenefitsOfMember  $benefitsOfMember
     * @return \Illuminate\Http\Response
     */
    public function show(BenefitsOfMember $benefitsOfMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BenefitsOfMember  $benefitsOfMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $benefit=BenefitsOfMember::findOrFail(encryptor('decrypt',$id));
        return view('Benefit.edit',compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BenefitsOfMember  $benefitsOfMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= BenefitsOfMember::findOrFail(encryptor('decrypt',$id));
            $b->benefit=$request->benefit;
            $b->description=$request->description;
            if($b->save()){
                Toastr::success('Benefits Updated Successfully!');
                return redirect()->route(currentUser().'.benefit.index');
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
     * @param  \App\Models\BenefitsOfMember  $benefitsOfMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= BenefitsOfMember::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Benefits Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
