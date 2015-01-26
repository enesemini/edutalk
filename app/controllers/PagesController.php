<?php

use Edutalk\Repositories\UsersRepositoryInterface;

class PagesController extends \BaseController {

	protected $user;

	public function __construct(UsersRepositoryInterface $user)
	{
		$this->user = $user;
	}


	/**
	 * Homepage für nicht eingeloggte Benutzer.
	 */
	public function home()
	{
		return View::make('pages.home');
	}

	/**
	 * Routes für die Suche
	 */
	public function postSearch()
	{
		$q = Input::all()['search'];

		return Redirect::route('search', $q);
	}
	public function search($q)
	{
		$search = $q;

		$searchUsers = User::where('username', 'LIKE', '%'. $q .'%')->get();

		$searchGroups = Group::where('name', 'LIKE', '%'. $q .'%')->orWhere('description', 'LIKE', '%'. $q .'%')->get();

		$searchTalks = Talk::where('message', 'LIKE', '%'. $q .'%')->get();;

		return View::make('pages.search', compact('search', 'searchUsers', 'searchGroups', 'searchTalks'));
	}


	/**
	 * Homepage für einen eingeloggten Benutzer.
	 */
	public function dashboard()
	{
		// Suche alle Gruppen des eingeloggten User, welche noch nicht aktiviert wurden vom User.
		$pivot = DB::table('group_user')->where('user_id', Auth::id())->where('activated', NULL)->get();
		foreach ($pivot as $invitation)
		{
			$invitations[] = Group::find($invitation->group_id);
		}

		// Alle aktivierten Gruppen des eingeloggten Users
		$activatedGroups = DB::table('group_user')->where('user_id', Auth::id())->where('activated', 1)->get();
		foreach ($activatedGroups as $group)
		{
			$groups[] = Group::find($group->group_id);
		}

		// Alle Talks der abonnierten Benutzer.

		$userTalks = $this->user->getFollowingTalks(Auth::user()->id);
		return View::make('pages.dashboard', compact('invitations', 'groups', 'userTalks'));
	}

	/**
	 * Erklärung was Edutalk ist.
	 */
	public function about()
	{
		return View::make('pages.about');
	}

	/**
	 * Impressum
	 */
	public function impressum()
	{
		return View::make('pages.impressum');
	}

}