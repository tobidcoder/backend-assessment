<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Mail\MyAlert;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    //threshold',
    //'currency',
    //'name',
    //'rates',
    public function sendNotification()
    {
        $users = User::all();

        foreach ($users as $user){

            $notifications = Notification::where('user_id', '=', $user->id)->get();

            foreach ($notifications as $notification){

                $currency = Currency::where('name',$notification->currency)->first();
                if($currency->rates >= $notification->threshold){
                    $email = $user->email;
                    $data = [
                        'title' => "Hello, $user->name",
                        'message' => "This is to informed you that $user->base_currency to $currency->name is now $currency->rates.",
                    ];

                    Mail::to($email)->send(new MyAlert($data));

                    dd("Mail Send Successfully");
                }

            }


    }

    }
}
