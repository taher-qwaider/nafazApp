<?php

namespace App\Http\Controllers\messages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WebNotificationController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function storeToken(Request $request)
    {
        $user = auth()->user();
        $user->device_key = $request->token;
        $user->save();
        return response()->json(['Token successfully stored.']);
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $serverKey = 'AAAAxVAvlGc:APA91bHIWIGUP219ivR95noV9ng-YlNfHezTa5svA9qOHXkhWqr3nrT4ZapfYf9fZZ59ij9FJnSDRLPITRfE6notWDbifH22z8oYvNkUQTcD9a_jCaWIfA6aNP-8Asf1B7ExebD6T15v';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        return response()->json(['message' => 'تم الإرسال بنجاح']);
        // FCM response
//        dd($result);
    }
}
