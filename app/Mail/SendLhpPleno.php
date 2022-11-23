<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLhpPleno extends Mailable
{
    public $user;
    public $lhp;
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $lhp)
    {
        $this->user = $user;
        $this->lhp = $lhp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Pleno Laporan Hasil Pengawasan')
        ->view('email.lhp_pleno');
    }
}
