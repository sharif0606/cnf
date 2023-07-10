<?php

namespace App\Http\Controllers;

use App\Models\photoGallaryCategory;
use App\Models\year;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PhotoGallaryCategoryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pGalleryCat=photoGallaryCategory::paginate(10);
        return view('pGalleryCat.index',compact('pGalleryCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = year::all();
        return view('pGalleryCat.create',compact('year'));
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
            $pgc=new photoGallaryCategory;

            $pgc->name=$request->name;
            $pgc->year_id=$request->year;
            $pgc->status=$request->status;
            if($request->has('feature_image'))
                $pgc->feature_image=$this->resizeImage($request->feature_image,'uploads/pGcategory',true,700,300,false);

            if($pgc->save()){
            Toastr::success('Photo Category Create Successfully!');
            return redirect()->route(currentUser().'.pGalleryCat.index');
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
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(photoGallaryCategory $photoGallaryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = year::all();
        $pGalleryCat=photoGallaryCategory::findOrFail(encryptor('decrypt',$id));
        return view('pGalleryCat.edit',compact('pGalleryCat','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pgc=photoGallaryCategory::findOrFail(encryptor('decrypt',$id));
            $pgc->name=$request->name;
            $pgc->year_id=$request->year;
            $pgc->status=$request->status;

            $path='uploads/pGcategory';
            if($request->has('feature_image') && $request->feature_image)
            if($this->deleteImage($pgc->feature_image,$path))
                $pgc->feature_image=$this->resizeImage($request->feature_image,$path,true,700,300,false);

            if($pgc->save()){
            Toastr::success('Photo Category Updated Successfully!');
            return redirect()->route(currentUser().'.pGalleryCat.index');
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
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(photoGallaryCategory $photoGallaryCategory)
    {
        //
    }
}
