<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class WinnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $winVote;

    public function __construct(Collection $winVote)
    {
        $this->winVote = $winVote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.winner')
            ->from('tspindola@gmail.com')
            ->subject('Você é o rei do almoço!')
            ->with(
                [
                    'winVote' => $this->winVote
                ]);
    }
}
