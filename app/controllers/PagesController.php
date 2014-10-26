<?php

class PagesController extends \BaseController {

	/**
	 * Homepage für nicht eingeloggte Benutzer.
	 */
	public function home()
	{
        return View::make('pages.home');
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


		return View::make('pages.dashboard', compact('invitations', 'groups'));
	}

}