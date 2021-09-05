<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class ChatController extends Controller
{
    //
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nafazapp-b0544-dd2a7300b3f7.json');
        $firebase = (new Factory())
            ->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://nafazapp-b0544-default-rtdb.firebaseio.com/');
            ->createDatabase();
        $newPost = $firebase
            ->getReference('chats');
//            ->push([
//                'title' => 'Post title',
//                'body' => 'This should probably be longer.'
//            ]);

        dump($newPost->getSnapshot());
        dd();
    }
}
