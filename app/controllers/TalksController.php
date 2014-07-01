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

		return View::make('talks.index', compact('talks'));
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
	 * Store a newly created talk in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Talk::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Talk::create($data);

		return Redirect::route('talks.index');
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
