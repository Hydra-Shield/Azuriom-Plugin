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
        '5.180.33.50',
        '5.180.33.33',
        '5.180.33.51',
        '5.180.33.70',
        '5.180.33.71',
        '5.180.33.34',
        '92.112.92.87',
        '92.112.92.100',
        '92.112.92.150',
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
