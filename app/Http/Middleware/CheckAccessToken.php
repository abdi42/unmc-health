<?php

namespace App\Http\Middleware;

use Closure;
use App\Subject;
use Carbon\Carbon;
use App\Services\iHealth;

class CheckAccessToken
{
    protected $ihealthService;

    public function __construct(iHealth $ihealth)
    {
        $this->ihealthService = $ihealth;
    }

    public function handle($request, Closure $next)
    {
        if ($request->route()->hasParameter('subject')) {
            $subject = $request->route()->parameter('subject');

            if ($subject->access_token == null) {
                return redirect('/subjects/' . $subject->subject)->withErrors([
                    'iHealth account not connected'
                ]);
            }

            if (Carbon::parse($subject->expires_in)->lt(Carbon::now())) {
                $body = $this->ihealthService->refreshToken($subject);

                $subject->refresh_token = $body->RefreshToken;
                $subject->access_token = $body->AccessToken;
                $subject->expires_in = Carbon::now()
                    ->addSecond($body->Expires)
                    ->toDateTimeString();

                $subject->save();
            }
        }
        return $next($request);
    }
}
