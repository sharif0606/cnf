<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices=Notice::paginate(10);
        return view('notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
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
            $notice=new Notice;
            $notice->title=$request->title;
            $notice->details=$request->Details;
            $notice->published_date=$request->publishedDate;
            $notice->unpublished_date=$request->unpublishedDate;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/notice_image'), $PictureName);
                $notice->image=$PictureName;
            }
            if($request->hasFile('noticefile')){
                $noticefileName = rand(111,999).time().'.'.$request->noticefile->extension();
                $request->noticefile->move(public_path('uploads/notice_image'), $noticefileName);
                $notice->noticefile=$noticefileName;
            }
            if($notice->save()){
            Toastr::success('Slider Create Successfully!');
            return redirect()->route(currentUser().'.notice.index');
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
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice=Notice::findOrFail(encryptor('decrypt',$id));
        return view('notice.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $notice=Notice::findOrFail(encryptor('decrypt',$id));
            $notice->title=$request->title;
            $notice->details=$request->Details;
            $notice->published_date=$request->publishedDate;
            $notice->unpublished_date=$request->unpublishedDate;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/notice_image'), $PictureName);
                $notice->image=$PictureName;
            }
            if($request->hasFile('noticefile')){
                $noticefileName = rand(111,999).time().'.'.$request->noticefile->extension();
                $request->noticefile->move(public_path('uploads/notice_image'), $noticefileName);
                $notice->noticefile=$noticefileName;
            }
            if($notice->save()){
                Toastr::success('Notice Update Successfully!');
            return redirect()->route(currentUser().'.notice.index');
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
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Notice::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Notice Deleted Permanently!');
        return redirect()->back();
    }
}
