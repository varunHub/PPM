<?php namespace platform\directory;

use Controller;
use View;
use platform\core as Core;
use Input;
use Redirect;
use Session;

class loginCont extends Core\coreController
{

	protected function setup()
	{
	}
	public function pst_Submit()
	{
		// validate the variables ======================================================
		$errors['username'] = 'Name is required.';
		$errors['password'] = 'password is required.';
		$data['errors']  = $errors;

		$input			= Input::all();
		
		$username  	= $input['data']['username'];
		//$input_email  	= $input['data']['username'];
		//$errors			= array();
  	//	$input_model 	= $input['data'];

		$data['username'] = $username.'1234';
		$data['success'] = true;
		//$data['message'] = "vv".count($input['data');
		echo json_encode($data);
	}
}