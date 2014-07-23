<?php

class FollowController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /follow
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function follow($username)
    {
        $user = User::where('username', $username)->first();
        $message = "Sie folgen $username jetzt.";

        Auth::user()->follow($user->id);

        return Redirect::route('users.show', $username)->withSuccess($message);
    }

    public function unfollow($username)
    {
        $user = User::where('username', $username)->first();
        $message = "Sie folgen $username nicht mehr.";

        Auth::user()->unfollow($user->id);

        return Redirect::route('users.show', $username)->withSuccess($message);
    }



}