<?php

namespace App\Http\Controllers\Settings\Location;

use App\Http\Controllers\Controller;

use App\Models\Settings\Location\Division;
use App\Models\Settings\Location\District;
use Illuminate\Http\Request;
use App\Http\Requests\District\AddNewRequest;
use App\Http\Requests\District\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Exception;
class DistrictController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $districts=District::all();
       return view('settings.location.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $divisions=Division::all();
       return view('settings.location.district.create',compact('divisions'));
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
            $district=new district;
            $district->division_id=$request->division_id;
            $district->name=$request->districtName;
            $district->name_bn=$request->districtBn;
            if($district->save())
                return redirect()->route(currentUser().'.district.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','please try again'));    
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show($district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($district)
    {
       $divisions=Division::all();
       $district=District::findOrFail(encryptor('decrypt',$district));
       return view('settings.location.district.edit',compact('district','divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $district)
    {
        try{
            $district=district::findOrFail(encryptor('decrypt',$district));
            $district->division_id=$request->division_id;
            $district->name=$request->districtName;
            $district->name_bn=$request->districtBn;
            if($district->save())
                return redirect()->route(currentUser().'.district.index')->with($this->resMessageHtml(true,null,'Successfully update'));
                else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
