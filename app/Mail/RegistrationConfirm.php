<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirm extends Mailable
{
    use Queueable, SerializesModels;
    protected $entryform;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($entryform)
    {
        $this->entryform = $entryform;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration_confirm')
            ->subject('RS100kmハイク 加盟登録確認')
            ->with('entryform', $this->entryform);
    }
}
