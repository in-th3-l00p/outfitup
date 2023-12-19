<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class StripeEventListener
{
    public function __construct() {
    }

    public function handle(WebhookReceived $event): void {
        switch ($event->payload["type"]) {
            case "checkout.session.completed":
                $sessionId = $event->payload["data"]["object"]["id"];
                try {
                    $session = Session::retrieve($sessionId);
                } catch (ApiErrorException $e) {
                    Log::error($e->getMessage());
                }
                break;
        }
    }
}
