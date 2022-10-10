<?php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use phpDocumentor\Reflection\Types\This;

class PaypalService
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public function client(): PayPalHttpClient
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     */
    private function environment(): ProductionEnvironment|SandboxEnvironment
    {
        if (config('paypal.mode') === 'sandbox') {
            return new SandboxEnvironment(config("paypal.sandbox.client_id"), config('paypal.sandbox.client_secret'));
        }

        return new ProductionEnvironment(config('paypal.live.client_id'), config('paypal.live.client_secret'));
    }
}