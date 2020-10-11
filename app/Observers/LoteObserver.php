<?php

namespace App\Observers;

use App\Models\Lote;

class LoteObserver
{
    /**
     * Handle the lote "created" event.
     *
     * @param  \App\Models\Lote  $lote
     * @return void
     */
    public function created(Lote $lote)
    {
        //
    }

    /**
     * Handle the lote "updated" event.
     *
     * @param  \App\Models\Lote  $lote
     * @return void
     */
    public function updated(Lote $lote)
    {
        //
    }

    /**
     * Handle the lote "deleted" event.
     *
     * @param  \App\Models\Lote  $lote
     * @return void
     */
    public function deleted(Lote $lote)
    {
        //
    }

    /**
     * Handle the lote "restored" event.
     *
     * @param  \App\Models\Lote  $lote
     * @return void
     */
    public function restored(Lote $lote)
    {
        //
    }

    /**
     * Handle the lote "force deleted" event.
     *
     * @param  \App\Models\Lote  $lote
     * @return void
     */
    public function forceDeleted(Lote $lote)
    {
        //
    }
}
