<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\MemberChildren;
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
        $ourmember=OurMember::whereNot('status',2)->paginate(10);
        return view('ourmember.index',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvedMember()
    {
        $ourmember=OurMember::where('status',2)->paginate(10);
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

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->husban_name=$request->husbanName;
            $member->mother_name=$request->mothersName;
            $member->nominee=$request->nominee;
            $member->birth_date=$request->dateOfBirth;
            $member->nationality=$request->nationality;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->club_designation=$request->club_designation;
            $member->company=$request->company;
            $member->cell_number=$request->CellNo;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->emailAddress;
            $member->role_id=5;
            $member->password=Hash::make($request->password);
            $member->blood_group=$request->bloodGroup;
            $member->national_id=$request->nationalid;
            $member->qualification=$request->qualification;
            $member->village=$request->vill;
            $member->postoffice=$request->postoffice;
            $member->upazila=$request->upazila;
            $member->district=$request->district;
            $member->present_address=$request->presentAddress;
            $member->office_address=$request->officeAddress;
            $member->others_date=$request->othersdate;
            // $member->signature_applicant=$request->signatureApplicant;
            if($request->hasFile('signatureApplicant')){
                $signatureApplicantName = rand(111,999).time().'.'.$request->signatureApplicant->extension();
                $request->signatureApplicant->move(public_path('uploads/our_member'), $signatureApplicantName);
                $member->signature_applicant=$signatureApplicantName;
            }
            $member->identify_president=$request->identifyPresident;
            $member->member_no=$request->memberNo;
            $member->mr_mis=$request->mrormis;
            $member->other_address=$request->otheraddress;
            if($request->hasFile('signaturefounderpresident')){
                $signaturefounderpresident = rand(1111,9999).time().'.'.$request->signaturefounderpresident->extension();
                $request->signaturefounderpresident->move(public_path('uploads/signature'), $signaturefounderpresident);
                $member->signature_founder_president=$signaturefounderpresident;
            }
            if($request->hasFile('foundervicepresident')){
                $foundervicepresident = rand(11,99).time().'.'.$request->foundervicepresident->extension();
                $request->foundervicepresident->move(public_path('uploads/signature'), $foundervicepresident);
                $member->signature_founder_vicepresident=$foundervicepresident;
            }
            $member->remarks=$request->remarks;
            $member->update_incometax=$request->updateincometax;
            $member->emergency_contact=$request->emergencycontact;
            $member->passport_notype=$request->passportnotype;
            $member->pdate_issue=$request->pdateissue;
            $member->issuing_authority=$request->issuingAuthority;
            $member->validity=$request->validity;
            $member->name_spouse=$request->namespouse;
            $member->occupation_spouse=$request->occupationSpouse;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->membership_no=$request->membershipno;

            if($request->has('image'))
                $member->image=$this->resizeImage($request->image,'uploads/member_image',true,140,175,false);

            $member->fb_link=$request->fb_link;
            $member->show_font=0;
            $member->order_b=0;
            $member->twter_link=$request->twter_link;
            $member->linkdin_link=$request->linkdin_link;
            $member->youtube_link=$request->youtube_link;
            $member->status=1;
            if($member->save()){
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            $mc=new MemberChildren;
                            $mc->member_id=$member->id;
                            $mc->name=$cname;
                            $mc->gender=$request->cgender[$i];
                            $mc->birth_date=$request->cbirth_date[$i];
                            $mc->occupation=$request->coccupation[$i];
                            $mc->save();
                        }
                    }
                }
            Toastr::success('our Member Create Successfully!');
            return redirect()->route(currentUser().'.ourMember.index');
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

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->husban_name=$request->husbanName;
            $member->mother_name=$request->mothersName;
            $member->nominee=$request->nominee;
            $member->birth_date=$request->dateOfBirth;
            $member->nationality=$request->nationality;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->club_designation=$request->club_designation;
            $member->company=$request->company;
            $member->cell_number=$request->CellNo;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->emailAddress;
            $member->role_id=5;
            if($request->has('password') && $request->password)
                $member->password=Hash::make($request->password);

            $member->blood_group=$request->bloodGroup;
            $member->national_id=$request->nationalid;
            $member->qualification=$request->qualification;
            $member->village=$request->vill;
            $member->postoffice=$request->postoffice;
            $member->upazila=$request->upazila;
            $member->district=$request->district;
            $member->present_address=$request->presentAddress;
            $member->office_address=$request->officeAddress;
            $member->others_date=$request->othersdate;
            // $member->signature_applicant=$request->signatureApplicant;
            if($request->hasFile('signatureApplicant')){
                $signatureApplicantName = rand(111,999).time().'.'.$request->signatureApplicant->extension();
                $request->signatureApplicant->move(public_path('uploads/our_member'), $signatureApplicantName);
                $member->signature_applicant=$signatureApplicantName;
            }
            $member->identify_president=$request->identifyPresident;
            $member->member_no=$request->memberNo;
            $member->mr_mis=$request->mrormis;
            $member->other_address=$request->otheraddress;
            if($request->hasFile('signaturefounderpresident')){
                $signaturefounderpresident = rand(1111,9999).time().'.'.$request->signaturefounderpresident->extension();
                $request->signaturefounderpresident->move(public_path('uploads/signature'), $signaturefounderpresident);
                $member->signature_founder_president=$signaturefounderpresident;
            }
            if($request->hasFile('foundervicepresident')){
                $foundervicepresident = rand(11,99).time().'.'.$request->foundervicepresident->extension();
                $request->foundervicepresident->move(public_path('uploads/signature'), $foundervicepresident);
                $member->signature_founder_vicepresident=$foundervicepresident;
            }
            $member->remarks=$request->remarks;
            $member->update_incometax=$request->updateincometax;
            $member->emergency_contact=$request->emergencycontact;
            $member->passport_notype=$request->passportnotype;
            $member->pdate_issue=$request->pdateissue;
            $member->issuing_authority=$request->issuingAuthority;
            $member->validity=$request->validity;
            $member->name_spouse=$request->namespouse;
            $member->occupation_spouse=$request->occupationSpouse;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->membership_no=$request->membershipno;

            $path='uploads/member_image';
            if($request->has('image') && $request->image)
            if($this->deleteImage($member->image,$path))
                $member->image=$this->resizeImage($request->image,$path,true,140,175,false);

            $member->fb_link=$request->fb_link;
            $member->show_font=$request->show_font;
            $member->order_b=$request->order_b;
            $member->status=$request->status;

            if($request->status==2){
                $member->member_id='0'.Carbon::now()->format('y'). str_pad((OurMember::whereYear('created_at', Carbon::now()->year)->where('status',2)->count() + 1),3,"0",STR_PAD_LEFT);
            }else{
                $member->member_id = null;
            }

            $member->twter_link=$request->twter_link;
            $member->linkdin_link=$request->linkdin_link;
            $member->youtube_link=$request->youtube_link;
            if($member->save()){
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            if($request->id[$i])
                                $mc=MemberChildren::find($request->id[$i]);
                            else
                                $mc=new MemberChildren;
                            $mc->member_id=$member->id;
                            $mc->name=$cname;
                            $mc->gender=$request->cgender[$i];
                            $mc->birth_date=$request->cbirth_date[$i];
                            $mc->occupation=$request->coccupation[$i];
                            $mc->save();
                        }
                    }
                }
                if ($request->status == 2) {
                    return redirect()->route(currentUser() . '.approve_member');
                } else {
                    return redirect()->route(currentUser() . '.ourMember.index');
                }
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
