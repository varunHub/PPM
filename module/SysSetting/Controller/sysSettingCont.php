<?php namespace module\SysSetting\Controller;

use Controller;
use View;
use platform\core as Core;
use Input;
use Redirect;
use Session;

class sysSettingCont extends Core\coreController
{
	protected function setup()
	{
		$this->json_model_key	= "sysSetting";
		$this->model_title		= "Setting";
		$this->model_name		= "module\SysSetting\Model\sysSetting";
		$this->view_listing		= 'SysSetting.View.admin.list.list_sysSetting';
		$this->view_single		= 'SysSetting.View.admin.single.sysSetting';
		$this->view_form		= 'SysSetting.View.admin.new_sysSetting';
		$_SESSION['UID']		=  123;	//Temporary current user_id
	}

	public function index()
	{
		$_model = $this->model_name;
		$use_model = $_model::orderBy('id', 'desc')->paginate(10);
		return View::make($this->view_listing)
			-> with('title',  $this->model_title)
			-> with($this->json_model_key, $use_model)
			;
	}
	public function pst_save($id)
	{
		$input 			= 	Input::all();
		$_model 		= 	$this->model_name;
		$use_model 		= 	new $_model;	
		$validator 		=	$use_model->validateData($input);

		$use_model->make();
		$use_model -> assignValues($input);

		if($validator->fails())
		{
			$messages = $validator->messages();
			$errors 	=implode("<br>", $messages->all());
				
			
			return View::make($this->view_form)
				-> with('resData',  $use_model)
				-> with('status',  'fail')
				-> with('error',  $errors)
				;

		}

		
		if($input['id'] == $use_model->def_id)
		{
			$status			=	$use_model -> save();
		}else
		{
			$use_model 		= 	new $_model;
			$use_model 		= $use_model::find($input['id']);
			$use_model->assignValues($input);
			$status 		= $use_model->save();
		}
		
		if($status == 1)
		{
			$status = "Success";
		}

		return View::make($this->view_form)
			-> with('resData',  $use_model)
			-> with('status',  $status)
			-> with('error',  '')
			;
	}
	public function get_single($id){

		$_model 	= $this->model_name;
		$use_model	= new $_model;
		$use_model 	= $_model::find($id);
		
		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
				return View::make($this->view_form)
				-> with('resData',  $use_model)
				-> with('status',  '')
				-> with('error',  '')			
				;
		}


		return View::make($this->view_single)
			-> with('resData',  $use_model)
			;
	}

	public function pst_lock($id)
	{
		$_model 				= 	$this->model_name;
		$use_model 				= 	new $_model;
		$sys_Setting 			= $use_model::find($id);
		$sys_Setting->locked 	= ($sys_Setting->locked + 1) % 2;
		$status 				= $sys_Setting->save();
		return Redirect::to('Admin/setting/'.$id);
	}

	public function pst_remove($id)
	{
		$_model 		= 	$this->model_name;
		$use_model 		= 	new $_model;
		$sys_Setting 	= $use_model::find($id);
		$sys_Setting->active = ($sys_Setting->active + 1) % 2;
		$status 		= $sys_Setting->save();
		return Redirect::to('Admin/setting/'.$id);
	}

	
	public function get_edit($id)
	{
		$_model 		= 	$this->model_name;
		$use_model 		= 	new $_model;
		$sys_Setting 	= $use_model::find($id);
		return View::make($this->view_form)
			-> with('resData',  $sys_Setting)
			-> with('status',  '')
			-> with('error',  '')
			-> with('id',  $id)
			;
	}


	protected function pst_search()
	{
		$input 			= 	Input::all();
		$_model 		= $this->model_name;
		$use_model		= new $_model;

		if(isset($input['search_value']))
		{
			$_SESSION['adm_search_value']		=  $input['search_value'];
			$_SESSION['adm_search_key']			=  $input['search_key'];
		}


		$value 			=	"%".$_SESSION['adm_search_value']."%";
		// dont use like this above - use sprint function to build the string
		$use_model 		= 	$use_model::where($_SESSION['adm_search_key'],'like', $value)->paginate(10);

		return View::make($this->view_listing)
			-> with('title',  $this->model_title)
			-> with($this->json_model_key, $use_model)
			;

	}

	



}