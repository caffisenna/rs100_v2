<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarRegistrationCreated extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $uuid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$uuid)
    {
        $this->name = $name;
        $this->uuid = $uuid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.carregistration_created')
            ->subject('RS100kmハイク 駐車許可証ダウンロードリンクのお知らせ')
            ->with('name', $this->name)
            ->with('uuid', $this->uuid);
    }
}
