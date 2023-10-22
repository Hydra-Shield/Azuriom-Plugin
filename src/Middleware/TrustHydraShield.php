<?php

namespace Azuriom\Plugin\HydraShieldSupport\Middleware;

use Azuriom\Http\Middleware\TrustProxies;
use Closure;
use Illuminate\Http\Request;

class TrustHydraShield extends TrustProxies
{
    /**
     * The trusted proxies for the application.
     *
     * The IP ranges can be found on https://api.hydra-shield.fr/?api-external=1&action=endpoint
     *
     * @var array
     */
    protected $proxies = [
        '103.252.90.90',
        '103.252.90.250',
        '103.252.90.210',
        '185.143.241.35',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Request::setTrustedProxies($this->proxies, $this->headers);
        return $next($request);
    }

}
