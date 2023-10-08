<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarRegistrationPublish extends Mailable
{
    use Queueable, SerializesModels;
    protected $publish_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($publish_data)
    {
        $this->publish_data = $publish_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.carregistration_published')
            ->subject('RS100kmハイク 駐車許可証ダウンロードリンクのお知らせ')
            ->with('publish_data', $this->publish_data);
    }
}
