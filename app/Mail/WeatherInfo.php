<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeatherInfo extends Mailable
{
    use Queueable, SerializesModels;

     public $name;
     public $weather;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $weather)
    {
        $this->name = $name;
        $this->weather = $weather;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Погода сейчас")
                    ->markdown('emails.weather_info');
    }
}
