<?php

namespace App\Http\Controllers;

use App\Models\video_notice;
use Illuminate\Http\Request;
use App\Http\Requests\videoNotice\AddNewRequest;
use App\Http\Requests\videoNotice\UpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class VideoNoticeController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoNotice = video_notice::paginate(10);
        return view('VideoNotice.index',compact('videoNotice'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('VideoNotice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $vn = new video_notice;
            $vn->title = $request->title;
            $vn->short_description = $request->short_description;
            $vn->long_description = $request->long_description;
            if($request->has('image'))
                $vn->image=$this->resizeImage($request->image,'uploads/video_notice',true,160,120,false);

            if($request->hasFile('notice_file')){
                $noticefileName = rand(111,999).time().'.'.$request->notice_file->extension();
                $request->notice_file->move(public_path('uploads/video_notice'), $noticefileName);
                $vn->notice_file=$noticefileName;
            }
            $vn->publish_date = $request->publish_date;
            $vn->link = $request->link;
            if($vn->save()){
                Toastr::success('Create Successfully!');
                return redirect()->route(currentUser().'.vNotice.index');
                }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
                }

        }catch (Exception $e){
            Toastr::warning('Please try Again!');
            //  dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function show(video_notice $video_notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videoNotice = video_notice::findOrFail(encryptor('decrypt',$id));
        return view('VideoNotice.edit',compact('videoNotice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $vn = video_notice::findOrFail(encryptor('decrypt',$id));
            $vn->title = $request->title;
            $vn->short_description = $request->short_description;
            $vn->long_description = $request->long_description;

            $path='uploads/video_notice';
            if($request->has('image') && $request->image)
            if($this->deleteImage($vn->image,$path))
                $vn->image=$this->resizeImage($request->image,$path,true,160,120,false);

            if($request->hasFile('notice_file')){
                $noticefileName = rand(111,999).time().'.'.$request->notice_file->extension();
                $request->notice_file->move(public_path('uploads/video_notice'), $noticefileName);
                $vn->notice_file=$noticefileName;
            }
            $vn->publish_date = $request->publish_date;
            $vn->link = $request->link;
            if($vn->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.vNotice.index');
                }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
                }

        }catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vn= video_notice::findOrFail(encryptor('decrypt',$id));
        $vn->delete();
        Toastr::warning('Deleted Permanently!');
        return redirect()->back();
    }
}
