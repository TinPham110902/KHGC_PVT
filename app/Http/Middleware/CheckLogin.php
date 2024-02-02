<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;
use App\Providers\RouteServiceProvider;
use App\Helper\FlashHelper;
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
            $statusMessages = [
                0 => 'Tài khoản đang chờ phê duyệt',
                2 => 'Tài khoản bị từ chối',
                3 => 'Tài khoản bị khóa'
            ];
        
            if (array_key_exists($user->status, $statusMessages)) {
                $errorMessage = $statusMessages[$user->status];

                FlashHelper::flashMessage('warning', $errorMessage);
                return redirect()->back();
            }
        }

     
    
        return $next($request);
    }


}
