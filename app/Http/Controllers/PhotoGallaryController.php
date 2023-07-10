<?php

namespace App\Http\Controllers;

use App\Models\photoGallary;
use App\Models\year;
use App\Models\photoGallaryCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Illuminate\Support\Facades\Storage;
use Exception;

class PhotoGallaryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pGallery=photoGallary::paginate(10);
        return view('pGallery.index',compact('pGallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pGalleryCat= photoGallaryCategory::all();
        return view('pGallery.create',compact('pGalleryCat'));
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
            $pgc=new photoGallary;

            $pgc->Caption=$request->Caption;
            $pgc->photo_gallary_category_id=$request->album;
            $pgc->status=$request->status;
            // if($request->has('feature_image'))
            //     $pgc->feature_image=$this->resizeImage($request->feature_image,'uploads/pGgallery',true,200,200,false);

            if($request->hasFile('feature_image')){
                $data = rand(111,999).time().'.'.$request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/pGgallery'), $data);
                $pgc->feature_image=$data;
            }
            if($pgc->save()){
            Toastr::success('Photo Gallery Create Successfully!');
            return redirect()->route(currentUser().'.pGallery.index');
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
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function show(photoGallary $photoGallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pGalleryCat= photoGallaryCategory::all();
        $pGallery=photoGallary::findOrFail(encryptor('decrypt',$id));
        return view('pGallery.edit',compact('pGallery','pGalleryCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pgc= photoGallary::findOrFail(encryptor('decrypt',$id));

            $pgc->Caption=$request->Caption;
            $pgc->photo_gallary_category_id=$request->album;
            $pgc->status=$request->status;
            
            // $path='uploads/pGgallery';
            // if($request->has('feature_image') && $request->feature_image)
            // if($this->deleteImage($pgc->feature_image,$path))
            //     $pgc->feature_image=$this->resizeImage($request->feature_image,$path,true,200,200,false);

            // if($request->hasFile('feature_image')){
            //     $data = rand(111,999).time().'.'.$request->feature_image->extension();
            //     $request->feature_image->move(public_path('uploads/pGgallery'), $data);
            //     $pgc->feature_image=$data;
            // }
            
            $previousImage = $pgc->feature_image;
            if ($request->hasFile('feature_image')) {
                // Delete the previous image if it exists
                if ($previousImage && Storage::exists('uploads/pGgallery/' . $previousImage)) {
                    Storage::delete('uploads/pGgallery/' . $previousImage);
                }
                // Generate a unique filename for the new image
                $data = rand(111, 999) . time() . '.' . $request->feature_image->extension();
                // Move the new image to the desired location
                $request->feature_image->move(public_path('uploads/pGgallery'), $data);
                // Update the feature_image field with the new image name
                $pgc->feature_image = $data;
            }

            if($pgc->save()){
            Toastr::success('Photo Gallery Updated Successfully!');
            return redirect()->route(currentUser().'.pGallery.index');
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
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= photoGallary::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Deleted Permanently!');
        return redirect()->back();
    }
}
