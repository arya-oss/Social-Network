<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Status;
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

	public function postReply(Request $req, $statusId) {
		$this->validate($req, [
			"reply-{$statusId}" => "required|max:1000",
		],[
			'required'  => 'The reply body is required.',
		]);
		$status = Status::notReply()->find($statusId);
		if(!$status) {
			return redirect()->route('home');
		}
		if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id) {
			return redirect()->route('home');
		}

		$reply = Status::create([
			'body'	=> $req->input("reply-{$statusId}"),
		])->user()->associate(Auth::user());
		$status->replies()->save($reply);
		return redirect()->back();
	}
}

?>