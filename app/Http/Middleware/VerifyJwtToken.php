<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\ExpiredException;

class VerifyJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = getenv("APP_KEY");
        $token = $request->bearerToken();

        try {
            $payload = JWT::decode($token, $key, array('HS256'));
        } catch (BeforeValidException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        } catch (SignatureInvalidException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        } catch (ExpiredException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 500);
        }

        return $next($request);
    }
}
