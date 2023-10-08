<?php

namespace Azuriom\Plugin\HydraShieldSupport\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Http\Middleware\TrustProxies;
use Azuriom\Plugin\HydraShieldSupport\Middleware\TrustHydraShield;

class HydraShieldSupportServiceProvider extends BasePluginServiceProvider
{
    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TrustProxies::class, TrustHydraShield::class);
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
