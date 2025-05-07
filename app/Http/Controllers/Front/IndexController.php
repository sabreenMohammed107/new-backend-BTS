<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\NewsLetter;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function sendMessage(Request $request){

        try{


            $user=  ContactMessage::create($request->all());
            $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
           // \Mail::to($emails)->send(new NewUserNotification($user));


              return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');



        }
        catch(QueryException $q){

            return redirect()->back()->with('message','You cannot send Empty Message...');

        }


    }

    public function sendNewsLetter(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:news_letters,email'
            ]);

            NewsLetter::create([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect()->back()->with('message', 'Thanks; your newsletter subscription has been submitted successfully!');
        } catch(QueryException $q) {
            return redirect()->back()->with('error', 'Error submitting newsletter subscription. Please try again.');
        }
    }

}
