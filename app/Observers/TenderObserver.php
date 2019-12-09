<?php

namespace App\Observers;

use App\Mail\TenderUpdateMail;
use App\Models\Tender;
use Illuminate\Support\Facades\Mail;

class TenderObserver
{
    /**
     * Handle the tender "created" event.
     *
     * @param  \App\Tender  $tender
     * @return void
     */
    public function created(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "updated" event.
     *
     * @param  \App\Tender  $tender
     * @return void
     */
    public function updated(Tender $tender)
    {

    }

    /**
     * Handle the tender "deleted" event.
     *
     * @param  \App\Tender  $tender
     * @return void
     */
    public function deleted(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "restored" event.
     *
     * @param  \App\Tender  $tender
     * @return void
     */
    public function restored(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "force deleted" event.
     *
     * @param  \App\Tender  $tender
     * @return void
     */
    public function forceDeleted(Tender $tender)
    {
        //
    }
}
