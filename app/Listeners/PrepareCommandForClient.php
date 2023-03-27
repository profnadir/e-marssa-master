<?php

namespace App\Listeners;

use App\Events\ProductCommande;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PrepareCommandForClient implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductCommande  $event
     * @return void
     */
    public function handle(ProductCommande $event)
    {
        \Log::info('envoi mail vers client :'. $event->product->name);
    }
}
