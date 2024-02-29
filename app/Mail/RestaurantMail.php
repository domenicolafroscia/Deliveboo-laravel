<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RestaurantMail extends Mailable
{
    use Queueable, SerializesModels;
    public Order $order;
    public Restaurant $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order, $_restaurant)
    {
        $this->order = $_order;
        $this->restaurant = $_restaurant;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('deliveboo@gmail.com', 'Deliveboo'),
            replyTo: new Address($this->restaurant->email, $this->restaurant->name),
            subject: 'New Order',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.restaurant-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
