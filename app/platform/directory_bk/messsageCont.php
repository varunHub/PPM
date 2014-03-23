<?php namespace platform\directory;

use Controller;
use View;
use platform\core as Core;
use Input;
use Redirect;
use Session;

class messsageCont extends Core\coreController
{
	protected function setup()
	{
		$this->json_model_key	= "topic_base";
		$this->model_title		= "messages";
		$this->model_name		= "platform\directory\modelsystem\\topic_base";
		$this->sys_model_name	= "platform\directory\modelsystem\\sysSetting";
		$this->view_listing		= 'platform.message.view_all';
		$this->view_single		= 'platform.message.view_single';
		$this->view_form		= 'platform.admin.new_sysSetting';
		$_SESSION['UID']		=  123;	//Temporary current user_id
	}


	public function get_messageHome($id)
	{
		$_SysModel = $this->sys_model_name;
		$sys_model	= new $_SysModel;
		if($sys_model->isActive('messages'))
		{
			return $this->pst_viewall($id);
		}
		else
		{
			$data['errormessage'] = 'notActive';
			$data['success'] = false;
			echo json_encode($data);
		}
	}


	public function pst_viewall($id) 
	{
		$_model 	= $this->model_name;
		$use_model	= new $_model;

		//$use_model 	= $_model::all();
		$use_model = $_model::where('user_list', 'like', '%#'.$id.'%')->paginate(10);
		//$use_model = $_model::whereRaw("user_list in ('01|02')", array(25))->get();

		return View::make($this->view_listing)
			-> with($this->json_model_key,  $use_model)
			;
	}
}