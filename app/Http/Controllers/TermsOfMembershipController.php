<?php

namespace App\Http\Controllers;

use App\Models\terms_of_membership;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class TermsOfMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = terms_of_membership::latest()->take(1)->get();
        return view('terms.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
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
            $term = new terms_of_membership();

            $term->title = $request->title;
            $term->terms_and_condition = $request->terms;

            if($term->save()){
                Toastr::success('Created Successfully');
                return redirect()->route(currentUser().'.terms.index');
            }else{
                Toastr::warning('please try again');
                return redirect()->back();
            }

        }
        catch(Exception $e){
            Toastr::warning('Please try again');
            // dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\terms_of_membership  $terms_of_membership
     * @return \Illuminate\Http\Response
     */
    public function show(terms_of_membership $terms_of_membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\terms_of_membership  $terms_of_membership
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terms = terms_of_membership::findOrFail(encryptor('decrypt', $id));
        return view('terms.edit',compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\terms_of_membership  $terms_of_membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $term = terms_of_membership::findOrFail(encryptor('decrypt', $id));

            $term->title = $request->title;
            $term->terms_and_condition = $request->terms;

            if($term->save()){
                Toastr::success('Updated Successfully');
                return redirect()->route(currentUser().'.terms.index');
            }else{
                Toastr::warning('Please Try again');
                return redirect()->back();
            }

        }
        catch(Exception $e){
            Toastr::warning('Please try again');
            // dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\terms_of_membership  $terms_of_membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(terms_of_membership $terms_of_membership)
    {
        //
    }
}
