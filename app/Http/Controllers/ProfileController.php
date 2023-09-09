<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function getProfile(){

        $user = Auth::user();
        // $products = Product::all();

        return view('pages.profile',compact('user'));
    }

    public function postProfile(Request $request){

        $user = Auth::user();
        // dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            //'email' => ['required', 'email', 'unique:users,email'.$user->id],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],

            'phone' => 'nullable',
            'password' => 'nullable|min:8|confirmed',
            //'link' => 'url',
        ]);

        // return "passed! :D";

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];

        if($request['password']){
        $user->password = bcrypt($request['password']);
        }

        $user->save();
        Session()->flash('message','Profile updated!');

        return redirect()->route('profile');
    }
}
