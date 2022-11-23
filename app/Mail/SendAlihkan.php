<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAlihkan extends Mailable
{
    public $alihkan;
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alihkan)
    {
        $this->alihkan = $alihkan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Pengalihan tindak lanjut Informasi Awal')
        ->view('email.alihkan_kecamatan');
    }
}
