<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        // auth()->check() && auth()->user()->update([
        //     'last_seen' => now(),
        //     'ip' => @$_SERVER['REMOTE_ADDR'],
        //     'user_agent' => @$_SERVER['HTTP_USER_AGENT'],
        //     'updated_at' => \DB::raw('updated_at'), // not working
        // ]);

        auth()->check() && User::withoutTimestamps(function() {
            User::where('id', auth()->user()->id)->update([
                'last_seen' => now(),
                'ip' => @$_SERVER['REMOTE_ADDR'],
                'user_agent' => @$_SERVER['HTTP_USER_AGENT'],
                'updated_at' => \DB::raw('updated_at'),
            ]);
        });
    }
}
