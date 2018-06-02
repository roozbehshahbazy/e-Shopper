<?php

namespace App\Mail;

use App\VerificationToken;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendVerificationToken extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(VerificationToken $token)
    {
        $this->token = $token;
        $this->user = User::where('id','=',$token->user_id)->first();

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('orders@etrademe.com')
                    ->subject('Please verify your email')->markdown('emails.verifications.verification')->with('user',$this->user);
    }
}
