<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller {
	public function postStatus(Request $req){
		$this->validate($req, [
			'status'  => 'required|max:1000'
		]);

		Auth::user()->statuses()->create([
			'body'  => $req->input('status')
		]);
		return redirect()->route('home')->with('info','Status Posted.');
	}
}

?>