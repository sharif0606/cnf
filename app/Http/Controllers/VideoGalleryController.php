<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use App\Models\VideoGallaryCategory;
use App\Models\year;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caption=VideoGallery::paginate(10);
        return view('video_gallery.index',compact('caption'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vGalleryCat= VideoGallaryCategory::all();
        return view('video_gallery.create',compact('vGalleryCat'));
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
            $vgallery=new VideoGallery;
            $vgallery->caption=$request->caption;
            $vgallery->video_gallary_category_id=$request->album;
            $vgallery->link=$request->link;
            
            $vgallery->status=$request->status;
            if($vgallery->save()){
            Toastr::success('Video Gallery Create Successfully!');
            return redirect()->route(currentUser().'.vgallery.index');
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
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGallery $videoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vGalleryCat= VideoGallaryCategory::all();
        $videogallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
        return view('video_gallery.edit',compact('videogallery','vGalleryCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $vgallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
            $vgallery->caption=$request->caption;
            $vgallery->video_gallary_category_id=$request->album;
            $vgallery->link=$request->link;
            
            $vgallery->status=$request->status;
            if($vgallery->save()){
            Toastr::success('Video Gallery Updateed Successfully!');
            return redirect()->route(currentUser().'.vgallery.index');
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
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vgallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
        $vgallery->delete();
        Toastr::warning('Slider Deleted Permanently!');
        return redirect()->back();
    }
}
