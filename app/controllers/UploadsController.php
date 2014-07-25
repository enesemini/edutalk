<?php

class UploadsController extends \BaseController {

    /**
     *
     * Product Image Upload
     *
     **/
    public function uploadImage()
    {
        $user = User::findOrFail(Auth::user()->id);
        $input = Input::all();

        $rules = ['file' => 'image|max:7000'];

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make("Nur Bilder sind erlaubt!", 400);
        }
        $file = Input::file('file');

        $ext =$file->getClientOriginalExtension();
        $destination = 'uploads/users/';
        $title = $file->getClientOriginalName();
        $filename = str_random(5);
        $name = $user->id."-".$filename.".".$ext;
        $path = $destination.$name;

        $upload_success = $file->move($destination, $name);


        if( $upload_success ) {
            $file = $user->uploads()->create(['title' => $title,'path' => $path, 'user_id' => $user->id]);

            $img = Image::make($path);
            $img->resize(null,200,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path, 100);

            return Response::json($file);
        } else {
            return Response::json("upload failed", 400);;
        }
    }

	/**
	 * Display a listing of uploads
	 *
	 * @return Response
	 */
	public function index()
	{
		$uploads = Upload::all();

		return View::make('uploads.index', compact('uploads'));
	}

	/**
	 * Show the form for creating a new upload
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('uploads.create');
	}

	/**
	 * Store a newly created upload in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Upload::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Upload::create($data);

		return Redirect::route('uploads.index');
	}

	/**
	 * Display the specified upload.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$upload = Upload::findOrFail($id);

		return View::make('uploads.show', compact('upload'));
	}

	/**
	 * Show the form for editing the specified upload.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$upload = Upload::find($id);

		return View::make('uploads.edit', compact('upload'));
	}

	/**
	 * Update the specified upload in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$upload = Upload::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Upload::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$upload->update($data);

		return Redirect::route('uploads.index');
	}

	/**
	 * Remove the specified upload from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Upload::destroy($id);

		return Redirect::route('uploads.index');
	}

}
