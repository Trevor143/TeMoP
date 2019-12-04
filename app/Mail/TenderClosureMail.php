<?php

namespace App\Mail;

use App\Models\Tender;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenderClosureMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tender;
    public $url;

    /**
     * Create a new message instance.
     *
     * @param Tender $tender
     */
    public function __construct(Tender $tender)
    {
        $this->tender = $tender;
        $this->url ='http://public.temop.test/user/tender/'.$tender->id.'/timeline';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tenderclose');
    }
}
