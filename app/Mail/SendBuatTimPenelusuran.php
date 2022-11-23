<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBuatTimPenelusuran extends Mailable
{
    public $user;
    public $informasi_awal;
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $informasi_awal)
    {
        $this->user = $user;
        $this->informasi_awal = $informasi_awal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Buat Tim Penelusuran Informasi Awal')
        ->view('email.buat_tim_penelusuran');
    }
}
