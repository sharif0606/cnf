<?php

namespace App\Http\Controllers;

use App\Models\scroll_notice;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ScrollNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srn = scroll_notice::paginate(10);
        return view('Scroll_notice.index',compact('srn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Scroll_notice.create');
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
            $srn = new scroll_notice();

            $srn->text = $request->text;
            $srn->published_date = $request->published_date;
            $srn->unpublished_date = $request->unpublished_date;

            if($srn->save()){
                Toastr::success('Created Successfully');
                return redirect()->route(currentUser().'.scrollN.index');
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
     * @param  \App\Models\scroll_notice  $scroll_notice
     * @return \Illuminate\Http\Response
     */
    public function show(scroll_notice $scroll_notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\scroll_notice  $scroll_notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $srn = scroll_notice::findOrFail(encryptor('decrypt', $id));
        return view('Scroll_notice.edit',compact('srn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\scroll_notice  $scroll_notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $srn = scroll_notice::findOrFail(encryptor('decrypt', $id));

            $srn->text = $request->text;
            $srn->published_date = $request->published_date;
            $srn->unpublished_date = $request->unpublished_date;

            if($srn->save()){
                Toastr::success('Updated Successfully');
                return redirect()->route(currentUser().'.scrollN.index');
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
     * @param  \App\Models\scroll_notice  $scroll_notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(scroll_notice $scroll_notice)
    {
        //
    }
}
