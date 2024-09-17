<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\heirship;
use Illuminate\Http\Request;
use App\Http\Requests\OurMember\AddNewRequest;
use App\Http\Requests\OurMember\UpdateRequest;
use App\Http\Traits\ImageHandleTraits;
use App\Models\fee_collection;
use App\Models\fee_collection_detail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Classes\sslSms;
use App\Models\setting;
use Illuminate\Support\Facades\Log;

class OurMemberController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ourmember=OurMember::where('approvedstatus',0)->orderBy('member_serial_no');
        if($request->member_serial_no)
            $ourmember=$ourmember->where('member_serial_no',$request->member_serial_no);
        if($request->member_serial_no_new)
            $ourmember=$ourmember->where('member_serial_no_new',$request->member_serial_no_new);
        if($request->name_bn)
            $ourmember=$ourmember->where('name_bn','like','%'.$request->name_bn.'%')->orWhere('name_en','like','%'.$request->name_bn.'%');
        if($request->nid)
            $ourmember=$ourmember->where('nid','like','%'.$request->nid.'%');
        if($request->license)
            $ourmember=$ourmember->where('license','like','%'.$request->license.'%');

        $ourmember=$ourmember->where('status',1)->paginate(10);

        return view('ourmember.index',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gsecretaryApproved(Request $request)
    {
        $ourmember=OurMember::where('approvedstatus',1)->orderBy('member_serial_no');
        if($request->member_serial_no)
            $ourmember=$ourmember->where('member_serial_no',$request->member_serial_no);
        if($request->member_serial_no_new)
            $ourmember=$ourmember->where('member_serial_no_new',$request->member_serial_no_new);
        if($request->name_bn)
            $ourmember=$ourmember->where('name_bn','like','%'.$request->name_bn.'%')->orWhere('name_en','like','%'.$request->name_bn.'%');
        if($request->nid)
            $ourmember=$ourmember->where('nid','like','%'.$request->nid.'%');
        if($request->license)
            $ourmember=$ourmember->where('license','like','%'.$request->license.'%');

        $ourmember=$ourmember->where('status',1)->paginate(10);
        
        return view('ourmember.gsecretaryApproved',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvedMember(Request $request)
    {
        $ourmember=OurMember::select('id','name_bn','member_serial_no','member_serial_no_new','profile_view_password','renew_serial_no','father_name','personal_phone','nid','designation_of_present_job','others_designation','district','blood_group','sms_send')->with('fee_collection_last','fee_amount')->where('approvedstatus',2)->orderBy('renew_serial_no');
        if($request->member_serial_no)
            $ourmember=$ourmember->where('member_serial_no',$request->member_serial_no);
        if($request->year){
            $expYear=$request->year;
            $ourmember=$ourmember->whereHas('fee_amount', function($q) use ($expYear){
                $q->where('year', '>=', $expYear);
            });
        }
        if($request->approve_date)
            $ourmember=$ourmember->where('member_approval_date',$request->approve_date);
        if($request->member_serial_no_new)
            $ourmember=$ourmember->where('member_serial_no_new',$request->member_serial_no_new);
        if($request->name_bn)
            $ourmember=$ourmember->where('name_bn','like','%'.$request->name_bn.'%')->orWhere('name_en','like','%'.$request->name_bn.'%');
        if($request->nid)
            $ourmember=$ourmember->where('nid','like','%'.$request->nid.'%');
        if($request->license)
            $ourmember=$ourmember->where('license','like','%'.$request->license.'%');

        $ourmember=$ourmember->where('status',1)->paginate(100);
        return view('ourmember.approveMember',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archiveMember(Request $request)
    {
       // DB::enableQueryLog();
        
        $ourmember=OurMember::with('fee_amount')->orderBy('member_serial_no');
        if($request->member_serial_no)
            $ourmember=$ourmember->where('member_serial_no',$request->member_serial_no);
        if($request->year){
            $expYear=$request->year;
            if($request->payStatus == 1 || $request->payStatus == ''){
                $ourmember=$ourmember->whereHas('fee_amount', function($q) use ($expYear){
                    $q->where('year', '>=', $expYear);
                });
            }elseif($request->payStatus == 2){
                $ourmember=$ourmember->WhereDoesntHave('fee_amount')->orWhereHas('fee_amount', function($q) use ($expYear){
                    $q->where('year', '<', $expYear);
                });
            }
        }else{
            $expYear= now()->format('Y');
            if($request->payStatus == 1){
                $ourmember=$ourmember->whereHas('fee_amount', function($q) use ($expYear){
                    $q->where('year', '>=', $expYear);
                });
            }elseif($request->payStatus == 2){
                $ourmember=$ourmember->WhereDoesntHave('fee_amount')->orWhereHas('fee_amount', function($q) use ($expYear){
                    $q->where('year', '<', $expYear);
                });
            }
        }
        
        if($request->member_serial_no_new)
            $ourmember=$ourmember->where('member_serial_no_new',$request->member_serial_no_new);
        if($request->name_bn)
            $ourmember=$ourmember->where('name_bn','like','%'.$request->name_bn.'%')->orWhere('name_en','like','%'.$request->name_bn.'%');
        if($request->renew_serial_no)
            $ourmember=$ourmember->where('renew_serial_no',$request->renew_serial_no);
        if($request->district)
            $ourmember=$ourmember->where('district',$request->district);
        if($request->nameAddress_of_present_institute)
            $ourmember=$ourmember->where('nameAddress_of_present_institute',$request->nameAddress_of_present_institute);
        if($request->nameOf_instituteOf_previousJob)
            $ourmember=$ourmember->where('nameOf_instituteOf_previousJob',$request->nameOf_instituteOf_previousJob);
        if($request->blood)
            $ourmember=$ourmember->where('blood_group',$request->blood);
        if($request->status)
            $ourmember=$ourmember->where('status',$request->status);

        $ourmember=$ourmember->paginate(10);
        //$query = DB::getQueryLog();

//dd($query);
        return view('ourmember.archiveMember',compact('ourmember'));
    }

    public function deletedMember(Request $request)
    {
        $ourmember = OurMember::onlyTrashed()->orderBy('member_serial_no');

        if ($request->member_serial_no)
            $ourmember = $ourmember->where('member_serial_no', $request->member_serial_no);
        if ($request->member_serial_no_new)
            $ourmember = $ourmember->where('member_serial_no_new', $request->member_serial_no_new);
        if ($request->name_bn)
            $ourmember = $ourmember->where('name_bn', 'like', '%' . $request->name_bn . '%');
        if ($request->renew_serial_no)
            $ourmember = $ourmember->where('renew_serial_no', $request->renew_serial_no);
        if ($request->status)
            $ourmember = $ourmember->where('status', $request->status);

        $ourmember = $ourmember->paginate(15);

        return view('ourmember.deletedMember', compact('ourmember'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ourmember.create');
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
            
            $member=new OurMember;

            $member->form_serial=$request->form_serial_no;
            $member->name_bn=$request->nameBn;
            $member->name_en=$request->nameEn;
            $member->father_name=$request->fatherName;
            $member->mother_name=$request->motherName;
            $member->spouse_name=$request->spouseName;
            $member->birth_date=$request->birthDate;
            $member->blood_group=$request->bloodGroup;
            $member->nid=$request->nid;
            $member->word_no=$request->wordNo;
            $member->present_address=$request->presentAddress;
            $member->village=$request->village;
            $member->post_office=$request->postOffice;
            $member->upazila=$request->upazila;
            $member->district=$request->district;
            $member->nameAddress_of_present_institute=$request->nameAddress_of_present_institute;
            $member->place_of_work=$request->place_of_work;
            $member->address_of_present_institute=$request->address_of_present_institute;
            $member->registraion_no_of_present_institute=$request->registraion_no_of_present_institute;
            $member->type_of_job=$request->type_of_job;
            $member->prottoyon=$request->prottoyon;
            $member->office_teliphone=$request->officeTeliphone;
            $member->personal_phone=$request->personalPhone;
            $member->license=$request->license;
            $member->issue_date=$request->issueDate;
            $member->exp_date=$request->expDate;
            $member->designation_of_present_job=$request->designation_of_present_job;
            if($request->designation_of_present_job == '4'){
                $member->others_designation=$request->others_designation;
            }
            $member->joining_date=$request->joiningDate;
            $member->nameOf_instituteOf_previousJob=$request->nameOf_instituteOf_previousJob;
            $member->designation_of_previous_job=$request->designation_of_previous_job;
            $member->job_expiration=$request->jobExpiration;
            $member->form_date=$request->formDate;
            $member->member_serial_no=$request->member_serial_no;
            $member->member_serial_no_new=OurMember::max('member_serial_no_new')+1;
            $member->approval_date=$request->approval_date;
            $member->role_id=5;
            $member->approvedstatus=0;
            $member->password=Hash::make(123456);//$request->password
            if($request->hasFile('applicant_signature')){
                $data = rand(111,999).time().'.'.$request->applicant_signature->extension();
                $request->applicant_signature->move(public_path('uploads/our_member'), $data);
                $member->applicant_signature=$data;
            }
            
            if($request->hasFile('image')){
                $data = rand(1111,9999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/memberImage'), $data);
                $member->image=$data;
                $member->image_change_approve= 0;
            }else{
                $member->image_change_approve= 1;
            }
            
            $member->status=1;
            if($member->save()){
                if($request->name_of_heirs){
                    foreach($request->name_of_heirs as $i=>$heirs){
                        if($heirs){
                            $mc=new heirship;
                            $mc->member_id = $member->id;
                            $mc->name_of_heirs = $heirs;
                            $mc->relation = $request->relation[$i];
                            $mc->save();
                        }
                    }
                }
                if($request->hasFile('applicant_signature')){
                    $data = $member->id.$member->member_serial_no.'.'.$request->applicant_signature->extension();
                    $request->applicant_signature->move(public_path('uploads/our_member'), $data);
                    $member->applicant_signature=$data;
                }
                if($request->hasFile('image')){
                    $data = $member->id.$member->member_serial_no.'.'.$request->image->extension();
                    $request->image->move(public_path('uploads/memberImage'), $data);
                    $member->image=$data;
                }elseif(!empty($request->base_image)){
                    $img = $request->base_image;
                    $folderPath = public_path('uploads/memberImage/');
                    
                    $image_parts = explode(";base64,", $img);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    
                    $image_base64 = base64_decode($image_parts[1]);
                    $fileName = $member->id.$member->member_serial_no. '.png';
                    
                    $file = $folderPath . $fileName;
                    //Storage::put($file, $image_base64);
                    file_put_contents( $file, $image_base64 );
                    $member->image=$fileName;
                }
                $member->save();
                Toastr::success('Create Successfully!');
                return redirect()->route(currentUser().'.ourMember.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            //dd($e);
            return back()->withInput();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        $nomini = heirship::where('member_id',$show_data->id)->get();
        $feeCollection = fee_collection::where('member_id',(encryptor('decrypt',$id)))->latest()->take(1)->get();
        $data = fee_collection::with('details')->where('member_id', (encryptor('decrypt',$id)))->get();
        return view('ourmember.show',compact('show_data','nomini','feeCollection','data'));
    }
    public function transHistory($id)
    {
        $data = fee_collection::with('details')->where('member_id', $id)->get();
        return view('ourmember.transhistory', compact('data'));
    }

    public function transHistoryAll(Request $request)
    {
        $feeDetailQuery = fee_collection_detail::query();

        if ($request->fdate) {
            $tdate = $request->tdate ? $request->tdate : $request->fdate;

            // Filter based on the related fee_collection's date
            $feeDetailQuery->whereHas('feeCollection', function (Builder $query) use ($request, $tdate) {
                $query->whereBetween('date', [$request->fdate, $tdate]);
            });
        }
        $feeDetail = $feeDetailQuery->get();

        $totalVouchers = $feeDetail->pluck('feeCollection.vhoucher_no')->unique()->count();
        $totalMembers = $feeDetail->pluck('feeCollection.member_id')->unique()->count();
        $totalAmount = $feeDetail->sum('amount');


        return view('ourmember.transhistorytwo', compact('feeDetail','totalVouchers','totalAmount','totalMembers'));
    }

    public function approval($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        $feeCollection = fee_collection::where('member_id',(encryptor('decrypt',$id)))->latest()->take(1)->get();
        $nomini = heirship::where('member_id',$show_data->id)->get();
        return view('ourmember.approvalShow',compact('show_data','nomini','feeCollection'));
    }
    public function general_show($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        $nomini = heirship::where('member_id',$show_data->id)->get();
        return view('ourmember.approvalShow',compact('show_data','nomini'));
    }

    public function approvalCancel($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        $nomini = heirship::where('member_id',$show_data->id)->get();
        return view('ourmember.approvalCancel',compact('show_data','nomini'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));
            $member->form_serial=$request->form_serial_no;
            $member->name_bn=$request->nameBn;
            $member->name_en=$request->nameEn;
            $member->father_name=$request->fatherName;
            $member->mother_name=$request->motherName;
            $member->spouse_name=$request->spouseName;
            $member->birth_date=$request->birthDate;
            $member->blood_group=$request->bloodGroup;
            $member->nid=$request->nid;
            $member->word_no=$request->wordNo;
            $member->present_address=$request->presentAddress;
            $member->village=$request->village;
            $member->post_office=$request->postOffice;
            $member->upazila=$request->upazila;
            $member->district=$request->district;
            $member->nameAddress_of_present_institute=$request->nameAddress_of_present_institute;
            $member->place_of_work=$request->place_of_work;
            $member->address_of_present_institute=$request->address_of_present_institute;
            $member->registraion_no_of_present_institute=$request->registraion_no_of_present_institute;
            $member->type_of_job=$request->type_of_job;
            $member->prottoyon=$request->prottoyon;
            $member->office_teliphone=$request->officeTeliphone;
            $member->personal_phone=$request->personalPhone;
            $member->license=$request->license;
            $member->issue_date=$request->issueDate;
            $member->exp_date=$request->expDate;
            $member->designation_of_present_job=$request->designation_of_present_job;
            if($request->designation_of_present_job == '4'){
                $member->others_designation=$request->others_designation;
            }
            $member->joining_date=$request->joiningDate;
            $member->nameOf_instituteOf_previousJob=$request->nameOf_instituteOf_previousJob;
            $member->designation_of_previous_job=$request->designation_of_previous_job;
            $member->job_expiration=$request->jobExpiration;
            $member->form_date=$request->formDate;
            $member->member_serial_no=$request->member_serial_no;
            $member->approval_date=$request->approval_date;
            $member->role_id=5;
            
            if($request->approvedstatus)
                $member->approvedstatus=$request->approvedstatus;

            if($request->has('password') && $request->password)
                $member->password=Hash::make($request->password);

            if($request->hasFile('applicant_signature')){
                $data = $member->id.$member->member_serial_no.'.'.$request->applicant_signature->extension();
                $request->applicant_signature->move(public_path('uploads/our_member'), $data);
                $member->applicant_signature=$data;
            }
            if($request->hasFile('image')){
                $data = $member->id.$member->member_serial_no.'.'.$request->image->extension();
                $request->image->move(public_path('uploads/memberImage'), $data);
                $member->image=$data;
                $member->image_change_approve= 0;
            }elseif(!empty($request->base_image)){
                $img = $request->base_image;
                $folderPath = public_path('uploads/memberImage/');
                
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $member->id.$member->member_serial_no. '.png';
                
                $file = $folderPath . $fileName;
                //Storage::put($file, $image_base64);
                file_put_contents( $file, $image_base64 );
                $member->image=$fileName;
                $member->image_change_approve= 0;
            }
            
            $member->status= $request->status;

            if($member->save()){
                if($request->name_of_heirs){
                    foreach($request->name_of_heirs as $i=>$heirs){
                        if($heirs){
                            if($request->id[$i])
                                $mc= heirship::find($request->id[$i]);
                            else
                                $mc=new heirship;
                            $mc->member_id = $member->id;
                            $mc->name_of_heirs = $heirs;
                            $mc->relation = $request->relation[$i];
                            $mc->save();
                        }
                    }
                }
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.ourMember.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            //dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }

    }

    public function memberApprov(Request $request, $id){
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));
            if(currentUser() == 'chairman'){
                $member->approvedstatus=2;
                $member->member_approval_date = $request->member_approval_date;
            }elseif(currentUser() == 'generalsecretary'){
                $member->approvedstatus=1;
            }else{
                $member->approvedstatus=0;
            }

            if($member->save()){
                if(currentUser() == 'generalsecretary'){
                    Toastr::success('Approved Successfully!');
                    return redirect()->route(currentUser().'.gs_approve_member');
                }elseif(currentUser() == 'chairman'){
                    if($member->sms_send !=1 ){ /** check member sms send before or not */
                        $smsClass= new sslSms();
                        if($member->personal_phone){
                            $phone=$member->personal_phone;
                            $rand=uniqid().rand(1000,9999);
                            $password = rand(111111, 999999);
                            $msg_text="ডিজিটাল পদ্ধতিতে নবায়ন করায় সিবিএ - ২৩৪ এর কার্যনির্বাহী পরিষদ এর পক্ষথেকে আপনাকে ধন্যবাদ।\nMember No: ".$member->member_serial_no."/".$member->member_serial_no_new."\nRSL: ".$member->renew_serial_no."\nPassword:".$password."\nওয়েবসাইট: https://cnfemployeesunion.com\n\nকৃতজ্ঞতায়\nসভাপতি: মো: খায়রুল বাশার মিল্টন\nসাধারণ সম্পাদক: মো: মোশাররফ হোসেন ভূঁইয়া";
                            $checksendsms=$smsClass->singleSms($phone, $msg_text, $rand);
                            Log::info($checksendsms->status_code.'-'.$phone);
                            if($checksendsms->status_code=="200"){
                                /* update member sms send status */
                                $member->sms_send=1;
                                $member->profile_view_password= $password;
                                $member->save();
                                $settingTable = setting::where('id',1)->first();
                                $settingTable->number_of_send_sms = $settingTable->number_of_send_sms + 1;
                                $settingTable->save();
                            }
                        }
                    }
                    Toastr::success('Approved Successfully!');
                    return redirect()->route(currentUser().'.approve_member');
                }else{
                    Toastr::success('Approved Successfully!');
                    return redirect()->route(currentUser().'.ourMember.index');
                }
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            //dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }
    }
    public function memberApprovCancel(Request $request, $id){
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));
            $member->approvedstatus=0;

            if($member->save()){
                Toastr::success('Approval Cancelled!');
                return redirect()->route(currentUser().'.approve_member');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            //dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= OurMember::findOrFail(encryptor('decrypt',$id));
        $cat->deleted_by = currentUserId();
        $cat->save(); 
        $cat->delete();
        Toastr::warning('Member Deleted Permanently!');
        return redirect()->back();
    }
}
