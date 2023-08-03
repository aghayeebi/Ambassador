<?php

namespace App\Listeners;

use App\Events\OrderCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAmbassadorListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCompletedEvent $event): void
    {
        $order = $event->order;

        \Mail::send('ambassador', ['order' => $order], function (\Illuminate\Mail\Message $message)use($order){
            $message->subject('A Order has been completed');
            $message->to($order->ambassador_email);
        });
    }
}
