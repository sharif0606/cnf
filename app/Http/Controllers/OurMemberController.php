<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\heirship;
use Illuminate\Http\Request;
use App\Http\Requests\OurMember\AddNewRequest;
use App\Http\Requests\OurMember\UpdateRequest;
use App\Http\Traits\ImageHandleTraits;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;
use Carbon\Carbon;

class OurMemberController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourmember=OurMember::paginate(10);
        return view('ourmember.index',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvedMember()
    {
        $ourmember=OurMember::paginate(10);
        return view('ourmember.approveMember',compact('ourmember'));
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
            $member->office_teliphone=$request->officeTeliphone;
            $member->personal_phone=$request->personalPhone;
            $member->license=$request->license;
            $member->issue_date=$request->issueDate;
            $member->exp_date=$request->expDate;
            $member->designation_of_present_job=$request->designation_of_present_job;
            $member->joining_date=$request->joiningDate;
            $member->nameOf_instituteOf_previousJob=$request->nameOf_instituteOf_previousJob;
            $member->designation_of_previous_job=$request->designation_of_previous_job;
            $member->job_expiration=$request->jobExpiration;
            $member->form_date=$request->formDate;
            $member->member_serial_no=$request->member_serial_no;
            $member->approval_date=$request->approval_date;
            $member->role_id=5;
            $member->password=Hash::make($request->password);
            if($request->hasFile('applicant_signature')){
                $data = rand(111,999).time().'.'.$request->applicant_signature->extension();
                $request->applicant_signature->move(public_path('uploads/our_member'), $data);
                $member->applicant_signature=$data;
            }
            
            if($request->hasFile('image')){
                $data = rand(1111,9999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/memberImage'), $data);
                $member->image=$data;
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
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.ourMember.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            dd($e);
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
        return view('ourmember.show',compact('show_data'));
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
            $member->office_teliphone=$request->officeTeliphone;
            $member->personal_phone=$request->personalPhone;
            $member->license=$request->license;
            $member->issue_date=$request->issueDate;
            $member->exp_date=$request->expDate;
            $member->designation_of_present_job=$request->designation_of_present_job;
            $member->joining_date=$request->joiningDate;
            $member->nameOf_instituteOf_previousJob=$request->nameOf_instituteOf_previousJob;
            $member->designation_of_previous_job=$request->designation_of_previous_job;
            $member->job_expiration=$request->jobExpiration;
            $member->form_date=$request->formDate;
            $member->member_serial_no=$request->member_serial_no;
            $member->approval_date=$request->approval_date;
            $member->role_id=5;
            if($request->has('password') && $request->password)
                $member->password=Hash::make($request->password);

            if($request->hasFile('applicant_signature')){
                $data = rand(111,999).time().'.'.$request->applicant_signature->extension();
                $request->applicant_signature->move(public_path('uploads/our_member'), $data);
                $member->applicant_signature=$data;
            }
            
            if($request->hasFile('image')){
                $data = rand(1111,9999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/memberImage'), $data);
                $member->image=$data;
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
            dd($e);
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
        $cat->delete();
        Toastr::warning('Member Deleted Permanently!');
        return redirect()->back();
    }
}
