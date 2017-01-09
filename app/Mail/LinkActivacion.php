<?php

namespace App\Mail;

use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LinkActivacion extends Mailable{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user_id;
    
    public function __construct($id){
        $this->user_id=intval($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $address = 'bot.tpming@gmail.com';
        $name = 'Bot Tpming';
        $subject = 'Activación de cuenta TPM - Ingeniería';


        $user=User::find($this->user_id);
        return $this->view('emails.activar_usuario',compact('user'))->from($address,$name)->subject($subject);
    }
}
