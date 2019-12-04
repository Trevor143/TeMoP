<?php

namespace App\Mail;

use App\Models\Tender;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenderDeclineAwardMail extends Mailable
{
    use Queueable, SerializesModels;
public $tender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tender $tender)
    {
        $this->tender = $tender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tendernotaward');
    }
}
