<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('user.index');
	}


	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Log user.
     *
     * @return Response
     */
    public function login()
    {
        return View::make('user.login');
    }

    public function loginHandle()
    {
    }

    /**
     * Logout user.
     *
     * @return Response
     */
    public function logout()
    {
        //
    }

    /**
     * Register user.
     *
     * @return Response
     */
    public function register()
    {
        return View::make('user.register');
    }

    public function registerHandle()
    {
    }

}
