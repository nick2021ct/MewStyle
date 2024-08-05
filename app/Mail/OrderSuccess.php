<?php

namespace App\Mail;

use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderDetails;
    /**
     * Create a new message instance.
     */
    public function __construct(Orders $order, $orderDetails)
    {
        $this->order = $order;
        $this->orderDetails = $orderDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Success',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
{
    return $this->view('mails.order_success')>with(['order' => $this->order,'orderDetails'=>$this->orderDetails]);
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
