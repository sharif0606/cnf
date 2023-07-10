<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\OurMember; // custome
use Illuminate\Http\Request;
use Session; // custome

use App\Http\Traits\ResponseTrait; // custome
class isMember
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('userId')){
            return redirect()->route('front');
        }else{
            $user=OurMember::findOrFail(currentUserId());
            if(!$user){
                return redirect()->route('front');
            }else if(currentUser() != 'member'){
                return redirect()->back()->with($this->resMessageHtml(false,'error','Access Denied'));
            }else if(!in_array($user->status, [0,1,2])){
                return redirect()->back()->with($this->resMessageHtml(false,'error','Access Denied'));
            }else{
                return $next($request);
            }
        }
        return redirect()->route('front');
    }
}
