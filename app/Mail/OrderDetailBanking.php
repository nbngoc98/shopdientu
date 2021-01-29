<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDetailBanking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $products;
    public $data;
    public function __construct($products,$data)
    {
        $this->products = $products;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nbngoc.it@gmail.com', 'Dịch Vụ Khách Hàng')
            ->view('home::homes.mail.order_detail_banking');
    }
}
