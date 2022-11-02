<?php

namespace App\Http\Middleware;

use App\Models\MRole;
use Closure;
use Illuminate\Http\Request;

class AccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->rId == MRole::where('rNama', 'Admin')->first()->rId || auth()->user()->rId == MRole::where('rNama', 'User')->first()->rId) {
            return $next($request);
        }

        return redirect()->back()->with('PermissionDenied', true);
    }
}