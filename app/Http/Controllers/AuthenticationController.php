<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\OurMember;
use App\Models\Settings\Company;
use App\Models\Settings\Branch;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\MemberSignupRequest;
use App\Http\Requests\Authentication\MemberSigninRequest;
use App\Http\Requests\Authentication\MemSigninRequest;
use App\Http\Requests\Authentication\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
class AuthenticationController extends Controller
{
    use ResponseTrait;

    public function signUpForm(){
        return view('authentication.register');
    }

    public function memberSignUpForm(){
        return view('frontend.members.memberRegister');
    }

    public function memberPasswordReset(){
        return view('frontend.members.reset');
    }

    public function memberSignUpStore(MemberSignupRequest $request){
        try{
            $user=new OurMember;
            $user->given_name=$request->givenName;
            $user->surname=$request->surname;
            $user->cell_number=$request->PhoneNumber;
            $user->email=$request->EmailAddress;
            $user->password=Hash::make($request->password);
            $user->role_id=5;
            if($user->save())
                return redirect('memberLogin')->with($this->resMessageHtml(true,null,'Successfully Registred'));
            else
                return redirect('memberLogin')->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect('memberLogin')->with($this->resMessageHtml(false,'error','Please try again'));
        }

    }
    public function signUpStore(SignupRequest $request){
        try{
            $company=new Company;
            $company->status=1;
            if($company->save()){
                $branch=new Branch;
                $branch->status=1;
                $branch->company_id=$company->id;
                if($branch->save()){
                    $user=new User;
                    $user->name=$request->FullName;
                    $user->contact_no=$request->PhoneNumber;
                    $user->email=$request->EmailAddress;
                    $user->password=Hash::make($request->password);
                    $user->company_id=$company->id;
                    $user->role_id=2;
                    if($user->save())
                        return redirect('login')->with($this->resMessageHtml(true,null,'Successfully Registred'));
                    else
                        return redirect('login')->with($this->resMessageHtml(false,'error','Please try again'));
                }else
                    return redirect('login')->with($this->resMessageHtml(false,'error','Please try again'));
            }else
                return redirect('login')->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect('login')->with($this->resMessageHtml(false,'error','Please try again'));
        }

    }

    public function signInForm(){
        return view('authentication.login');
    }
    public function memberSignInForm(){
        return view('frontend.members.memberLogin');
    }
    public function memSignInForm(){
        return view('frontend.memDashboard.memberLogin');
    }

    public function memSignInCheck(MemSigninRequest $request){
        try{
            $member=OurMember::where('membership_no',$request->memberId)->first();
            if($member){
                if(Hash::check($request->password , $member->password)){
                    $this->memberSetSession($member);
                    return redirect()->route($member->role->identity.'.memdashboard')->with($this->resMessageHtml(true,null,'Successfully login'));
                }else
                    return redirect()->route('memLogin')->with($this->resMessageHtml(false,'error','Your id or password is wrong!'));
            }else
                return redirect()->route('memLogin')->with($this->resMessageHtml(false,'error','Your id or password is wrong!'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->route('memLogin')->with($this->resMessageHtml(false,'error','Your id or password is wrong!'));
        }
    }
    public function memberSignInCheck(MemberSigninRequest $request){
        try{
            $member=OurMember::where('email',$request->EmailAddress)->first();
            if($member){
                if(Hash::check($request->password , $member->password)){
                    $this->memberSetSession($member);
                    return redirect()->route($member->role->identity.'.dashboard')->with($this->resMessageHtml(true,null,'Successfully login'));
                }else
                    return redirect()->route('memberLogin')->with($this->resMessageHtml(false,'error','Your email or password is wrong!'));
            }else
                return redirect()->route('memberLogin')->with($this->resMessageHtml(false,'error','Your email or password is wrong!'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->route('memberLogin')->with($this->resMessageHtml(false,'error','Your email or password is wrong!'));
        }
    }
    public function signInCheck(SigninRequest $request){
        try{
            $user=User::where('contact_no',$request->PhoneNumber)->first();
            if($user){
                if(Hash::check($request->password , $user->password)){
                    $this->setSession($user);
                    return redirect()->route($user->role->identity.'.dashboard')->with($this->resMessageHtml(true,null,'Successfully login'));
                }else
                    return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
            }else
                return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
        }
    }

    public function memberSetSession($member){
        return request()->session()->put(
                [
                    'userId'=>encryptor('encrypt',$member->id),
                    'roleIdentity'=>encryptor('encrypt',$member->role->identity),
                    'email'=>encryptor('encrypt',$member->email),
                    'phone'=>encryptor('encrypt',$member->cell_number),
                    'membership_no'=>encryptor('encrypt',$member->membership_no),
                    'membership_type'=>encryptor('encrypt',$member->membership_applied),
                    'address'=>encryptor('encrypt',$member->present_address),
                    'status'=>encryptor('encrypt',$member->status),
                    'full_name'=>encryptor('encrypt',$member->full_name),
                    'image'=>encryptor('encrypt',$member->image)
                ]
            );
    }
    public function setSession($user){
        return request()->session()->put(
                [
                    'userId'=>encryptor('encrypt',$user->id),
                    'userName'=>encryptor('encrypt',$user->name),
                    'role'=>encryptor('encrypt',$user->role->type),
                    'roleIdentity'=>encryptor('encrypt',$user->role->identity),
                    'language'=>encryptor('encrypt',$user->language),
                    'companyId'=>encryptor('encrypt',$user->company_id),
                    'branchId'=>encryptor('encrypt',$user->branch_id),
                    'image'=>$user->image?$user->image:'no-image.png'
                ]
            );
    }

    public function singOut(){
        request()->session()->flush();
        return redirect('login')->with($this->resMessageHtml(false,'error',currentUserId()));
    }
    public function memberSingOut(){
        request()->session()->flush();
        return redirect()->route('front');
    }
}
