<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Mail\VerifyOtp;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class SendEmailListener
{
    
    public function __construct()
    {
    }
    
    public function handle(SendMail $event)
    {
        $data=$event->data;

        try {
            Mail::to( $data['email'])->send(new VerifyOtp($data) );
        } catch (Exception $e) {
            // Handle the exception
        }
    }
}
