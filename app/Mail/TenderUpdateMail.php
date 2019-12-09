<?php

namespace App\Mail;

use App\Models\Tender;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenderUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tender;
    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tender $tender, $request)
    {
        $this->tender = $tender;
        $this->request =$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tenderupdate');
    }
}
