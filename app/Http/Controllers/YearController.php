<?php

namespace App\Http\Controllers;

use App\Models\year;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class YearController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year= year::paginate(10);
        return view('year.index',compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('year.create');
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
            $y=new year;

            $y->year=$request->year;
            if($request->has('feature_photo'))
                $y->feature_photo=$this->resizeImage($request->feature_photo,'uploads/yearPhoto',true,400,300,false);

            if($request->has('feature_video'))
                $y->feature_video=$this->resizeImage($request->feature_video,'uploads/yearVideo',true,400,300,false);

            if($y->save()){
            Toastr::success('Year Create Successfully!');
            return redirect()->route(currentUser().'.year.index');
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
     * @param  \App\Models\year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = year::findOrFail(encryptor('decrypt',$id));
        return view('year.edit',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $y=year::findOrFail(encryptor('decrypt',$id));
            $y->year=$request->year;

            $path='uploads/yearPhoto';
            if($request->has('feature_photo') && $request->feature_photo)
            if($this->deleteImage($y->feature_photo,$path))
                $y->feature_photo=$this->resizeImage($request->feature_photo,$path,true,400,300,false);

            $path2='uploads/yearVideo';
            if($request->has('feature_video') && $request->feature_video)
            if($this->deleteImage($y->feature_video,$path2))
                $y->feature_video=$this->resizeImage($request->feature_video,$path2,true,400,300,false);

            if($y->save()){
            Toastr::success('Year Updated Successfully!');
            return redirect()->route(currentUser().'.year.index');
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
     * @param  \App\Models\year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(year $year)
    {
        //
    }
}
