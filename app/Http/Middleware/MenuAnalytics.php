<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GeoIp2\Database\Reader;
use App\Models\CustomerVisit;

class MenuAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->saveVisit();

        return $next($request);
    }

    private function saveVisit()
    {
        if(auth()->check()) return; // ignore auth users because it's me or client

        try {
            $visitId = $_COOKIE['visit_id'] ?? null;

            if ($visitId) {
                CustomerVisit::where('id', $visitId)->increment('visits_count');
            }else{

                $cityDbReader = new Reader(public_path('data/GeoLite2-City.mmdb'));

                try { // if ip address not in database
                    $record = $cityDbReader->city($_SERVER['REMOTE_ADDR']);
                } catch (\Throwable $e) { }

                $visit = CustomerVisit::create([
                    'ip' => @$_SERVER['REMOTE_ADDR'],
                    'city' => $record->city->name ?? null,
                    'region' => $record->mostSpecificSubdivision->name ?? null,
                    'country' => $record->country->name ?? null,
                    'country_iso' => $record->country->isoCode ?? null,
                    'user_agent' => @$_SERVER['HTTP_USER_AGENT'],
                    'referer' => @$_SERVER['HTTP_REFERER'],
                    'accept_language' => @$_SERVER['HTTP_ACCEPT_LANGUAGE'],
                ]);

                setcookie("visit_id", $visit->id, strtotime('tomorrow midnight'));
            }
        } catch (\Throwable $e) { }
    }
}
