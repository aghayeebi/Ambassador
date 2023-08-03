<?php

namespace App\Listeners;

use App\Events\OrderCompletedEvent;
use http\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class NotifyAdminListener
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

        \Mail::send('admin', ['order' => $order], function (\Illuminate\Mail\Message $message){
            $message->subject('A Order has been completed');
            $message->to('admin@admin.com');
        });
    }
}
