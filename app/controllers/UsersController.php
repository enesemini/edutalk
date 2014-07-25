<?php

use Edutalk\Repositories\TalksRepositoryInterface;
use Edutalk\Repositories\UsersRepositoryInterface;

class UsersController extends \BaseController {


    protected $talks;
    protected $user;

    public function __construct(TalksRepositoryInterface $talks, UsersRepositoryInterface $user)
    {
        $this->talks = $talks;
        $this->user = $user;
    }

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->user->getAllPaginated(28);

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
        $userId = User::where('username', $username)->first()->id;
        $user = $this->user->getWithTalks($userId);


        $followers = $user->followers()->take(6);
        $following = $user->following()->take(6);

        $followersCount = count($user->followers());
        $followingCount = count($user->following());

		return View::make('users.show', compact('user', 'followers', 'following', 'followersCount', 'followingCount'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
        return $user;
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}
