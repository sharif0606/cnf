<?php

namespace App\Http\Controllers;

use App\Models\FrontMenu;
use App\Models\Page;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
class FrontMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=FrontMenu::all();
        $pages=Page::all();
        return view('frontmenu.index',compact('menus','pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_update(Request $request)
    {
        try{
            if($request->id)
                $data=FrontMenu::find($request->id);
            else
                $data=new FrontMenu;

            $data->name=$request->name;
            $data->href=$request->href;
            
            $data->save();
            Toastr::success('Menu Create Successfully!');
            return redirect()->route(currentUser().'.front_menu.index');
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }
    /* delete menu */
    function destroy(Request $request){
        $data=FrontMenu::find($request->id);
        $data->delete();
            Toastr::success('Menu Deleted Successfully!');
            return back();
    }
    /* update menu order */
	function mss(Request $request)
    {
		// Get the JSON string
		$jsonstring = $request->jsonstring;
		
		// Decode it into an array
		$jsonDecoded = json_decode($jsonstring, true, 64);
		// Run the function above
		$readbleArray = $this->parseJsonArray($jsonDecoded);
		
		// Loop through the "readable" array and save changes to DB
		foreach ($readbleArray as $key => $value) {
		
			// $value should always be an array, but we do a check
			if (is_array($value)) {
                $data=FrontMenu::find($value['id']);
                $data->rang=$key;
                $data->parent_id=$value['parentID'];
                
                $data->save();
			}
		}
		//print_r($readbleArray);
	}
	
	/* Function to parse the multidimentional array into a more readable array 
	 * Got help from stackoverflow with this one:
	 *    http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
	*/
	function parseJsonArray($jsonArray, $parentID = 0)
	{
	  $return = array();
	  foreach ($jsonArray as $subArray) {
		 $returnSubSubArray = array();
		 if (isset($subArray['children'])) {
		   $returnSubSubArray = $this->parseJsonArray($subArray['children'], $subArray['id']);
		 }
		 $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
		 $return = array_merge($return, $returnSubSubArray);
	  }

	  return $return;
	}
    
}
