<?php

namespace App\Http\Middleware;

use App\Events\ManageTenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HandleTenantSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         //check if company name is null
        // if(Auth::user()->company_name == '') {
        //     return redirect()->route('onboarding');
        // }

        if(!currentTenantId()) {

            if(Auth::check()) {
                
                // reset tenant session id
                $tenantId = Auth::user()->current_tenant_id;
                if($tenantId) {
                    event(new ManageTenant($tenantId, 'set'));
                    return $next($request);
                }

                return $next($request);
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
