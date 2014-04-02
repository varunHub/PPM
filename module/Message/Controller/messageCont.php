<?php namespace module\Message\Controller;

use Controller;
use View;
use platform\core as Core;
use Input;
use Redirect;
use Session;

class messageCont extends Core\coreController
{
	protected function setup()
	{
		$this->json_model_key	= "topic_base";
		$this->model_title		= "messages";
		$this->model_name		= "module\Message\Model\messageService";
		$this->view_listing		= 'Message.View.view_all';
		$this->test				= 'Message.View.test';
		$this->view_single		= 'Message.View.view_single';
		$this->view_form		= 'Message.View.new_sysSetting';
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


	public function get_viewall($id) 
	{
		$_model 	= 	$this->model_name;
		$use_model	= 	new $_model;

		$res		=	$use_model->getTopicList($id);

		//$use_model 	= $_model::all();
		//$use_model = $_model::where('user_list', 'like', '%#'.$id.'%')->paginate(10);
		//$use_model = $_model::whereRaw("user_list in ('01|02')", array(25))->get();
		return View::make($this->test, array('user' => $res));
		//return View::make($this->view_listing)
		//	-> with($this->json_model_key,  $res)
		//	;
	}
}