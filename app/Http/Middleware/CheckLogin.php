<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;
use App\Providers\RouteServiceProvider;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

   
            $email = $request->input('email');
        $user = User::where('email', $email)->first();

 
        if ($user) {
            switch ($user->status) {
                case 0:
                    return redirect()->back()->with('err', 'Tài khoản đang chờ phê duyệt');
                case 2:
                    return redirect()->back()->with('err', 'Tài khoản bị từ chối');
                case 3:
                    return redirect()->back()->with('err', 'Tài khoản bị khóa');
            }
        }    
    
        return $next($request);
    }


}
