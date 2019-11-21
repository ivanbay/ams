<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller {

    public function send() {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("ivan.bay@maximintegrated.com")->send(new TestEmail($objDemo));
    }

}
