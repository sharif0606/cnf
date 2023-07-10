<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class BlogCategoryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcat=BlogCategory::get();
        return view('blogcategory.index',compact('blogcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogcategory.create');
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
            $blogcat=new BlogCategory();
            $blogcat->category_name=$request->name;
            if($request->has('feature_image'))
            $blogcat->feature_image=$this->resizeImage($request->feature_image,'uploads/BlogCategory',true,520,350,false);
            $blogcat->status=$request->status;
            if($blogcat->save()){
            Toastr::success('Blog Category Create Successfully!');
            return redirect()->route(currentUser().'.blogcategory.index');
            }else{
            return redirect()->back();
            Toastr::warning('Please try Again!');
            }

        }
        catch (Exception $e){
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogcat=BlogCategory::findOrFail(encryptor('decrypt',$id));
        return view('blogcategory.edit',compact('blogcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $blogcat=BlogCategory::findOrFail(encryptor('decrypt',$id));
            $blogcat->category_name=$request->name;
            if($request->has('feature_image'))
            $blogcat->feature_image=$this->resizeImage($request->feature_image,'uploads/BlogCategory',true,520,350,false);
            $blogcat->status=$request->status;
            if($blogcat->save()){
            Toastr::success('Blog Category Updated Successfully!');
            return redirect()->route(currentUser().'.blogcategory.index');
            }else{
            return redirect()->back();
            Toastr::warning('Please try Again!');
            }

        }
        catch (Exception $e){
            // dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogcat=BlogCategory::findOrFail(encryptor('decrypt',$id));
        $blogcat->delete();
        Toastr::warning('BlogCat Deleted Permanently!');
        return redirect()->back();
    }
}
