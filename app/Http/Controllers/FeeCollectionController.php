<?php

namespace App\Http\Controllers;

use App\Models\fee_collection;
use App\Models\Payment_purpose;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(fee_collection $fee_collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fee_collection  $fee_collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fee_collection $fee_collection)
    {
        //
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
