<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $messageContent;
    public $shopName;

    /**
     * Create a new message instance.
     *
     * @param string $shopName
     * @param string $subject
     * @param string $messageContent
     * @return void
     */
    public function __construct($shopName, $subject, $messageContent)
    {
        $this->shopName = $shopName;
        $this->subject = "{$shopName} さんからのご案内: {$subject}";  // タイトルに店舗名と件名を含める
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->markdown('emails.notice')
            ->with([
                'shopName' => $this->shopName,
                'messageContent' => $this->messageContent,
            ]);
    }
}


