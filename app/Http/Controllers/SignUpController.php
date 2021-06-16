<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Visitor;

class SignUpController extends Controller
{
    public function index(){
        return view('front.user.sign-up',[
            'categories' => Category::where('publication_status', 1)->get(),
        ]);
    }

    public function newSignUp(Request $request){
        Visitor::saveVisitorInfo($request);
        return redirect('/');
    }

    public function visitorLogout(Request $request){
        $request->session()->forget('visitorId');
        $request->session()->forget('visitorName');

        return redirect('/');

    }

    public function visitorLogin(){
        return view('front.user.sign-in',[
            'categories' => Category::where('publication_status', 1)->get(),
        ]);
    }

    public function visitorSignIn(Request $request){
        $visitor = Visitor::where('email_address', $request->email_address)->first();
        if($visitor){
            if(password_verify($request->password, $visitor->password)){

                $request->session()->put('visitorId', $visitor->id);
                $request->session()->put('visitorName', $visitor->first_name.' '.$visitor->last_name);

                return redirect('/');
            } else{
                return redirect('/visitor-login')->with('message', 'Wrong Password.');
            }
        } else{
            return redirect('visitor-login')->with('message', 'Wrong Email.');
        }
    }
}
