<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller {
	public function getSignup(){
		return view('auth.signup');
	}
	public function postSignup(Request $req){
		$this->validate($req, [
			'email' => 'required|unique:users|email|max:255',
			'username' => 'required|unique:users|alpha_dash|max:255',
			'password' => 'required|min:6'
		]);
		
		User::create([
			'email'  =>  $req->input('email'),
			'username'  =>  $req->input('username'),
			'password'  =>  bcrypt($req->input('password'))
		]);
		return redirect()->route('home')->with('info' , 'Your account has been created and you can sign in now.');
	}
	public function getSignin(){
		return view('auth.signin');
	}
	public function postSignin(Request $req) {
		$this->validate($req, [
			'email' => 'required|email|max:255',
			'password' => 'required|min:6'
		]);

		if(! Auth::attempt($req->only(['email', 'password']), $req->has('remeber'))) {
			return redirect()->back()->with('info', 'Invalid email or password');
		}
		return redirect()->route('home')->with('info', 'You are Signed in Now');
	}

	public function getSignout(){
		Auth::logout();
		return redirect()->route('home')->with('info', 'Signed out successfully');
	}
}

?>