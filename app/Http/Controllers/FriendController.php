<?php
namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Reqquest;

class FriendController extends Controller {

	public function getIndex(){
		$friends = Auth::user()->friends();
		$requests = Auth::user()->friendRequests();
		return view('friends.index')
				->with('friends', $friends)
				->with('requests', $requests);
	}
}

?>