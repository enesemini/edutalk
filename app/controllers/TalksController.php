<?php


class TalksController extends \BaseController {

	/**
	 * Display a listing of talks
	 *
	 * @return Response
	 */
	public function index()
	{
		$talks = Talk::all();
        $user = Auth::User();

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
        //message
        $message = Input::get('message');

        //Validate if message is empty
		$validator = Validator::make([ 'message' => $message ], Talk::$rules);

        //Redirect if Validation fails
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        //Save a talk
		Talk::create(['message' => $message, 'user_id' => Auth::user()->id]);

		return Redirect::route('talks.index')->with('success', 'Ihr Talk wurde gespeichert!');
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
