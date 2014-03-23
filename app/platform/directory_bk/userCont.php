<?php namespace platform\directory;

use Controller;
use View;
use platform\core as Core;
use Input;
use Redirect;
use Session;

class userCont extends Core\coreController
{
	protected function setup()
	{
		$this->json_model_key	= "userDetail";
		$this->model_title		= "UserHome";
		$this->model_name		= "platform\directory\modelsystem\user_base";
		$this->view_home		= 'platform.user.home';
	}


	public function get_home($id) 
	{
		$_model 	= $this->model_name;
		$use_model	= new $_model;

		$use_model 	= $_model::where('user_id', '=', $id)->take(1)->get();

		return View::make($this->view_home)
			-> with('resData',  $use_model)
			;
	}



}