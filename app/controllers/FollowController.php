<?php

use Edutalk\Repositories\TalksRepositoryInterface;
use Edutalk\Repositories\UsersRepositoryInterface;

class FollowController extends \BaseController {

    protected $talks;
    protected $user;

    public function __construct(TalksRepositoryInterface $talks, UsersRepositoryInterface $user)
    {
        $this->talks = $talks;
        $this->user = $user;
    }

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

    public function user_following($username)
    {
        $user = User::where('username', $username)->first();
        $follows = $this->user->getPaginatedFollowing($user->id);

        $followers = $user->followers()->take(6);
        $following = $user->following()->take(6);

        $followersCount = count($user->followers());
        $followingCount = count($user->following());

        return View::make('users.following', compact('follows', 'user', 'followers','following','followersCount','followingCount'));
    }
    public function user_followers($username)
    {
        $user = User::where('username', $username)->first();
        $follows = $this->user->getPaginatedFollowers($user->id);

        $followers = $user->followers()->take(6);
        $following = $user->following()->take(6);

        $followersCount = count($user->followers());
        $followingCount = count($user->following());

        return View::make('users.followers', compact('follows', 'user', 'followers','following','followersCount','followingCount'));
    }




}