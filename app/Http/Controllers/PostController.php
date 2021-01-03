<?php

namespace App\Http\Controllers;
use Cookie;
use App\User;
use App\Attachement;
use App\Mail\WelcomeMail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Bus\Dispatchable;

class PostController extends Controller
{

    public function queueMail(){


        // sendMail([
        //     'view' => 'emails.welcome',
        //     'to' => 'admin_email@gmail.com',
        //     'subject' => 'New inquiry form Submitted',
        //     'name' => 'CMS',
        //     'data' => []
        //   ]);



        dispatch(new SendEmailJob());

        return "Mail Sent";
    }


    public function users() {


        $articles = Cache::remember('articles', 22*60, function() {
            return User::all();
        });
        return response()->json($articles);



    }


}
