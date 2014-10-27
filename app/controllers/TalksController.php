<?php

use Edutalk\Repositories\TalksRepositoryInterface;
use Edutalk\Repositories\UsersRepositoryInterface;

class TalksController extends \BaseController {


    protected $talks;
    protected $user;

    public function __construct(TalksRepositoryInterface $talks, UsersRepositoryInterface $user)
    {
        $this->talks = $talks;
        $this->user = $user;
    }


	/**
	 * Display a listing of talks
	 *
	 * @return Response
	 */
	public function index()
	{
		$talks = $this->talks->getAll();
        //return $talks;
		return View::make('talks.index', compact('talks', 'user'));
	}

	/**
	 * Show the form for creating a new talk
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('talks.create');
	}

	/**
	 * Neuen Talk in der Datenbank speichern
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        //message
        $message = Input::get('message');

        //Überprüfe ob message leer ist.
		$validator = Validator::make([ 'message' => $message ], Talk::$rules);

        //Redirect, wenn Validation nicht erfolgreich ist.
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (isset($input['group_id']))
		{
			Talk::create(['message' => $message, 'group_id' => $input['group_id'], 'user_id' => Auth::user()->id]);
		}
		else
		{
        //Talk speichern
		Talk::create(['message' => $message, 'user_id' => Auth::user()->id]);
		}

		return Redirect::back()->with('success', 'Ihr Talk wurde gespeichert!');
	}

	/**
	 * Display the specified talk.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$talk = Talk::findOrFail($id);

		return View::make('talks.show', compact('talk'));
	}

	/**
	 * Show the form for editing the specified talk.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$talk = Talk::find($id);

		return View::make('talks.edit', compact('talk'));
	}

	/**
	 * Update the specified talk in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$talk = Talk::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Talk::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$talk->update($data);

		return Redirect::route('talks.index');
	}

	/**
	 * Remove the specified talk from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Talk::destroy($id);

		return Redirect::route('talks.index');
	}

}
