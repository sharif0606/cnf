<?php

namespace App\Http\Controllers;

use App\Models\VideoGallaryCategory;
use App\Models\year;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class VideoGallaryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vgallery_cat=VideoGallaryCategory::paginate(10);
        return view('video_gallery_category.index',compact('vgallery_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = year::all();
        return view('video_gallery_category.create',compact('year'));
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
            $vgallerycat=new VideoGallaryCategory;
            $vgallerycat->name=$request->name;
            $vgallerycat->year_id=$request->year;
            if($request->hasFile('FeatureImage')){
                $FeatureImageName = rand(111,999).time().'.'.$request->FeatureImage->extension();
                $request->FeatureImage->move(public_path('uploads/vgallerycat_image'), $FeatureImageName);
                $vgallerycat->feature_img=$FeatureImageName;
            }
            $vgallerycat->status=$request->status;
            if($vgallerycat->save()){
            Toastr::success('Video Gallery Category Create Successfully!');
            return redirect()->route(currentUser().'.vgalleryCat.index');
            }else{
            return redirect()->back();
            Toastr::warning('Please try Again!');
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
     * @param  \App\Models\VideoGallaryCategory  $videoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGallaryCategory $videoGallaryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoGallaryCategory  $videoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = year::all();
        $videogallery_cat=VideoGallaryCategory::findOrFail(encryptor('decrypt',$id));
        return view('video_gallery_category.edit',compact('videogallery_cat','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoGallaryCategory  $videoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $vgallerycat=VideoGallaryCategory::findOrFail(encryptor('decrypt',$id));
            $vgallerycat->name=$request->name;
            $vgallerycat->year_id=$request->year;
            if($request->hasFile('FeatureImage')){
                $FeatureImageName = rand(111,999).time().'.'.$request->FeatureImage->extension();
                $request->FeatureImage->move(public_path('uploads/vgallerycat_image'), $FeatureImageName);
                $vgallerycat->feature_img=$FeatureImageName;
            }
            $vgallerycat->status=$request->status;
            if($vgallerycat->save()){
            Toastr::success('Video Gallery Category Updated Successfully!');
            return redirect()->route(currentUser().'.vgalleryCat.index');
            }else{
            return redirect()->back();
            Toastr::warning('Please try Again!');
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
     * @param  \App\Models\VideoGallaryCategory  $videoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vgallery=VideoGallaryCategory::findOrFail(encryptor('decrypt',$id));
        $vgallery->delete();
        Toastr::warning('Video Category Deleted Permanently!');
        return redirect()->back();
    }
}
