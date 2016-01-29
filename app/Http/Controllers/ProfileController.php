<?php
namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {

	public function getProfile($username) {
		$user = User::where('username', $username)->first();
		if(!$user)
			abort(404);

		$statuses = $user->statuses()->notReply()->get();

		return view('profile.index')->with('user', $user)
			->with('statuses', $statuses)
			->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
	}
	public function getEdit(){
		return view('profile.edit');
	}
	public function postEdit(Request $req){
		$this->validate($req, [
			'first_name' => 'alpha|max:50',
			'last_name'  => 'alpha|max:50',
			'location'   => 'max:30',
		]);
		Auth::user()->update([
			'first_name'  => $req->input('first_name'),
			'last_name'  => $req->input('last_name'),
			'location'  => $req->input('location'),
		]);
		return redirect()->route('profile.edit')
			   ->with('info', 'Your profile has been updated.');
	}
}

?>