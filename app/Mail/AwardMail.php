<?php

namespace App\Mail;

use App\Models\Bidder;
use App\Models\Tender;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AwardMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bidder ;
    public $tender;

    /**
     * Create a new message instance.
     *
     * @param Bidder $bidder
     * @param Tender $tender
     */
    public function __construct(Bidder $bidder, Tender $tender)
    {
        $this->bidder = $bidder;
        $this->tender = $tender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vendor.backpack.email.award');
    }
}
