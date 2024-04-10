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
        '103.252.88.145',
        '15.204.166.198',
        '89.213.131.254',
        '185.255.123.217',
        '188.214.157.25',
        '103.106.228.31',
        '147.78.0.83',
        '103.75.119.179',
        '129.232.219.220',
        '109.104.155.47',
        '45.144.30.208',
        '129.232.219.220',
    
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
        // We use CF-Connecting-IP instead of X-Forwarded-For since
        // it has a consistent format containing only one IP.
         $request->headers->set('X-Forwarded-For', $request->header('X-Forwarded-For'));

        Request::setTrustedProxies($this->proxies, $this->headers);

        return $next($request);
    }

}
