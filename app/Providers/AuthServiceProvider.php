<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Token Lifetimes
        Passport::tokensExpireIn(Carbon::now()->addDays(15));

        // Refresh Token Lifetimes
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        // Pruning Revoked Tokens
        //Passport::pruneRevokedTokens();

        // Token Scopes
        //Passport::tokensCan([
        //    'place-orders' => 'Place orders',
        //    'check-status' => 'Check order status',
        //]);
    }
}
