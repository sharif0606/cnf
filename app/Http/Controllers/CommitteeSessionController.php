<?php

namespace App\Http\Controllers;

use App\Models\committee_session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class CommitteeSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = committee_session::paginate(12);
        return view('committeeSession.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('committeeSession.create');
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
            $b= new committee_session;
            $b->session_name=$request->session;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.committeeSession.index');
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
     * @param  \App\Models\committee_session  $committee_session
     * @return \Illuminate\Http\Response
     */
    public function show(committee_session $committee_session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\committee_session  $committee_session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comSession = committee_session::findOrFail(encryptor('decrypt',$id));
        return view('committeeSession.edit',compact('comSession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\committee_session  $committee_session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= committee_session::findOrFail(encryptor('decrypt',$id));
            $b->session_name=$request->session;
            if($b->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.committeeSession.index');
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
     * @param  \App\Models\committee_session  $committee_session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= committee_session::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
