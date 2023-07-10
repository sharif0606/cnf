<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\committee_session;
use App\Models\executive_committee;
use App\Models\MemberChildren;
use App\Models\terms_of_membership;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;
use DB;

class MemberPanel extends Controller
{
    use ImageHandleTraits;
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function memberProfile()
    {
        
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.members.memberProfile',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function foundingMember()
    {
        
        $foundMember = DB::table('our_members')
                ->join('founding_committees', 'our_members.membership_no', '=', 'founding_committees.member_id')
                ->select('our_members.*')->get();
        return view('frontend.membership.foundingMember',compact('foundMember'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function executiveSession()
    {
        $committeeSession = committee_session::all();
        return view('frontend.membership.committeeSession',compact('committeeSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function executiveMember($slug)
    {
        $committeeSession = committee_session::all();
        $session = committee_session::where('id', $slug)->first();
        $exMember = executive_committee::where('committee_sessions_id', $session->id)->get();
        return view('frontend.membership.executiveCommittee', compact('exMember','committeeSession'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function termsConditon()
    {
        $terms = terms_of_membership::latest()->take(1)->first();
        return view('frontend.members.terms',compact('terms'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function memberlist(Request $request, $letter = null)
    {
        $search = $request['name']?? "";
        $memberType = $request['member_type'] ?? "";
        $member_id = $request->input('member_id', '');
        $member_name = $request->input('member_name', '');
        $members = OurMember::query();

        if ($search != "") {
            $members->where('company', 'LIKE', '%'.$search.'%');
        }

        if ($letter) {
            $members->where('company', 'LIKE', $letter.'%');
        }

        if ($memberType != "") {
            $members->where('membership_applied', $memberType);
        }

        if (!empty($member_id) && !empty($member_name)) {
            $members->where(function ($query) use ($member_id, $member_name) {
                $query->where('member_id', $member_id)
                      ->where('given_name', 'LIKE', '%'.$member_name.'%');
            });
        } elseif (!empty($member_id)) {
            $members->where('member_id', $member_id);
        } elseif (!empty($member_name)) {
            $members->where('given_name'.'', 'LIKE', '%'.$member_name.'%');
        }

        $member = $members->paginate(10);
        return view('frontend.membership.memberList', compact('member','search','memberType', 'member_id', 'member_name'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function memberPassword()
    {
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.memDashboard.memberPassword',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */

    public function mem_pass_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = OurMember::findOrFail(currentUserId());

        if (!(Hash::check($request->get('current_password'), $user->password))) {
            return redirect()->back()
                ->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()
                ->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()
            ->with('success', 'Password changed successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mem_regi_success()
    {
        $show_data=OurMember::findOrFail(currentUserId());
        return view('frontend.members.registration_success',compact('show_data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function memberProfileUpdate(Request $request)
    {
        try{
            $member=OurMember::findOrFail(currentUserId());

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
            $member->company=$request->company;
            $member->description=$request->description;
            if($request->hasFile('attach_pdf')){
                $filename = rand(111,999).time().'.'.$request->attach_pdf->extension();
                $request->attach_pdf->move(public_path('uploads/company_pdf'), $filename);
                $member->attach_pdf=$filename;
            }
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->email;
            $member->role_id=5;

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
            $member->twter_link=$request->twter_link;
            $member->linkdin_link=$request->linkdin_link;
            $member->youtube_link=$request->youtube_link;
            if($member->save()){
                request()->session()->put(
                    [
                        'full_name'=>encryptor('encrypt',$member->full_name),
                        'email'=>encryptor('encrypt',$member->email),
                        'phone'=>encryptor('encrypt',$member->cell_number),
                        'status'=>encryptor('encrypt',$member->status),
                    ]);
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
                Toastr::success('Profile Updated Successfully!');
                return redirect()->route('member.registration.success');
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
}
