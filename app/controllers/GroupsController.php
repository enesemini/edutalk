<?php

use Edutalk\Repositories\UsersRepositoryInterface;

class GroupsController extends \BaseController {

	protected $user;

    public function __construct(UsersRepositoryInterface $user)
    {
        $this->user = $user;
    }

	/**
	 * Zeige eine Liste aller Gruppen, denen der eingeloggte User beigetreten ist.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Alle aktivierten Gruppen des eingeloggten Users
		$activatedGroups = DB::table('group_user')->where('user_id', Auth::id())->where('activated', 1)->get();
		foreach ($activatedGroups as $group)
		{
			$groups[] = Group::find($group->group_id);
		}

		return View::make('groups.index', compact('groups'));
	}

	/**
	 * Formular zum erstellen einer Gruppe anzeigen.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('groups.create');
	}

	/**
	 * Eine erstellte Gruppe in der Datenbank speichern.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Inputdaten von der groups.create Route
        $input = Input::all();
        $name = Input::get('name');
        $description = Input::get('description');
        $private = Input::get('private');
        $user = Auth::user()->id;
        /*if (!isset($private))
        {
        	return $private
        	$private = '1';
        }*/
		$validator = Validator::make($input, Group::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$group = Group::create(['name' => $name, 'description' => $description, 'private' => $private, 'user_id' => $user]);

		// Bei der erstellten Gruppe beitreten.
		Auth::user()->enterGroup($group->id);
		Auth::user()->groups()->updateExistingPivot($group->id, ['activated' => '1']);
		return Redirect::route('groups.show', $group->id)->with('success', 'Die Gruppe wurde erstellt!');
	}

	/**
	 * Eine bestimmte Gruppe anzeigen.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::findOrFail($id);
		$admin = User::find($group->user_id); // Ersteller der Gruppe
		$user_id = Auth::user()->id; // Eingeloggter User
		$followers = $this->user->getPaginatedFollowers($user_id); // Follower des eingeloggten User für die Einladungen.

		$membersCount = count($group->users);
		$sideMembers = $group->users->take(6);
		if ( Auth::user()->hasAccessToGroup($id) ) {
			// Prüft, ob der eingeloggte User in Gruppe ist, und bestimmt ob er zugriff hat.
			$access = true;
			$talks = Talk::where('group_id', $id)->orderBy('created_at', 'desc')->get();
		} else {
			// Wenn der User nicht in der Gruppe ist, dann hat er keinen Zugriff.
			$access = false;
		}

		return View::make('groups.show', compact('group', 'admin', 'talks', 'access', 'followers', 'sideMembers', 'membersCount'));
	}

	/**
	 * Formular anzeigen um eine bestimmte Gruppe zu bearbeiten.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::find($id);

		return View::make('groups.edit', compact('group'));
	}

	/**
	 * Daten der bestimmten Gruppe in der Datenbank aktualisieren.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$group = Group::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Group::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$group->update($data);

		return Redirect::route('groups.index');
	}

	/**
	 * Remove the specified group from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Group::destroy($id);

		return Redirect::route('groups.index');
	}

	/**
	 * Der eingeloggte Benutzer tritt in eine bestimmte Gruppe ein.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function enterGroup($id)
	{
		$group = Group::findOrFail($id);
		if(!$group->users()->find(Auth::id())){
			Auth::user()->enterGroup($id);
			Auth::user()->groups()->updateExistingPivot($id, ['activated' => '1']);
		} else {
			return Redirect::route('groups.show', $id)->withError('Sie sind bereits in dieser Gruppe.');
		}

		return Redirect::route('groups.show', $id)->withSuccess('Sie sind dieser Gruppe beigetreten.');
	}
	/**
	 * Der Benutzer verlässt eine bestimmte Gruppe.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function leaveGroup($id)
	{
		$group = Group::findOrFail($id);
		if($group->users()->find(Auth::id())){
			Auth::user()->leaveGroup($id);
		} else {
			return Redirect::route('groups.show', $id)->withError('Sie können diese Gruppe nicht verlassen, da Sie nicht beigetreten sind.');
		}

		return Redirect::route('groups.show', $id)->withSuccess('Sie sind aus dieser Gruppe ausgetreten.');
	}

	/**
	 * Der eingeloggte User lädt einen oder mehrere seiner Follower in eine Gruppe ein.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function invite()
	{
		$input = Input::all();
		$groupId = $input['group'];
		// Erstelle ein Array mit den IDs der Benutzer (vom Input)
		$userIds = explode(',', $input['users']);

		// Jeden Benutzer aus dem Array zur Gruppe hinzufügen
		// Anmerkung: 'activated' ist auf NULL -> Einladung
		foreach ($userIds as $user) {
			$user = User::find($user);
			$user->enterGroup($groupId);
		}

		return Redirect::route('groups.show', $groupId)->withSuccess('Die Einladungen wurden verschickt!');
	}

	/**
	 * Der eingeloggte User nimmt die Einladung zu einer bestimmten Gruppe an.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function acceptInvitation($id)
	{
		Auth::user()->groups()->updateExistingPivot($id, ['activated' => '1']);
		return Redirect::route('groups.show', $id)->withSuccess('Sie sind der Gruppe beigetreten!');
	}
	/**
	 * Der eingeloggte User nimmt die Einladung zu einer bestimmten Gruppe an.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function declineInvitation($id)
	{
		Auth::user()->leaveGroup($id);
		Redirect::route('dashboard', $id);
	}

	public function members($id)
	{
		$group = Group::findOrFail($id);
		$members = $group->users;
		$admin = User::find($group->user_id); // Ersteller der Gruppe
		$user_id = Auth::user()->id; // Eingeloggter User
		$followers = $this->user->getPaginatedFollowers($user_id); // Follower des eingeloggten User für die Einladungen.

		$membersCount = count($group->users());
		$sideMembers = $group->users->take(6);

		if ( Auth::user()->hasAccessToGroup($id) ) {
			// Prüft, ob der eingeloggte User in Gruppe ist, und bestimmt ob er zugriff hat.
			$access = true;
		} else {
			// Wenn der User nicht in der Gruppe ist, dann hat er keinen Zugriff.
			$access = false;
		}

		return View::make('groups.members', compact('group', 'access', 'members', 'admin', 'user_id', 'followers', 'membersCount', 'sideMembers'));
	}
}
