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


           return redirect()->route('thanks');
        } catch (QueryException $q) {
            return redirect()->back()->with('message','You cannot send an empty message...');
        }


    }

    public function sendNewsLetter(Request $request){
        try {
            $request->validate([
                'email' => 'required|email|max:255|unique:news_letters,email'
            ]);

            NewsLetter::create([
                'email' => $request->email
            ]);

            $message = 'Thank you for subscribing. You have been successfully added to our newsletter.';

            // Return JSON for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $message
                ]);
            }

            return redirect()->back()->with('message', $message);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = 'This email is already subscribed to our newsletter.';

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 422);
            }

            return redirect()->back()->with('error', $errorMessage);
        } catch(QueryException $q) {
            $errorMessage = 'Error submitting newsletter subscription. Please try again.';

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }

            return redirect()->back()->with('error', $errorMessage);
        }
    }

}
