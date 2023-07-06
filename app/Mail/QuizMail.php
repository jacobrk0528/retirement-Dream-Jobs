<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuizMail extends Mailable
{
    use Queueable, SerializesModels;

    public $results;
    public $userDetails;

    /**
     * Create a new message instance.
     *
     * @param  array  $formData
     * @return void
     */
    public function __construct(array $results, array $userDetails)
    {
        $this->results = $results;
        $this->userDetails = $userDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Completed Quiz')
                    ->view('emails.quiz-email')
                    ->with('results', $this->results, $this->userDetails);
    }
}
