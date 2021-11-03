<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\SiteContactMessage;

class SiteContact extends Mailable
{
    use Queueable, SerializesModels;

    public $siteContactMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SiteContactMessage $siteContactMessage)
    {
        //
        $this->siteContactMessage = $siteContactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('crtl@crtl.portalcrtelecom.com.br', 'Contato - Portal')->view('contact');
    }
}
