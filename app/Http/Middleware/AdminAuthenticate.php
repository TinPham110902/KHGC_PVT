<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;
use App\Helper\FlashHelper;
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
            
        $user = Auth::User();

        if($user->role == 'admin')
        {
            return $next($request);
        }
       

      
        FlashHelper::flashMessage('warning', 'Bạn không có quyền truy cập!');
        return redirect()->back();
    }
}
