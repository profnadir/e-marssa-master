<?php

namespace App\Listeners;

use App\Events\ProductCommande;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdmin 
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
        \Log::info('nouveau produit a ete commande'. $event->product->name);
    }
}