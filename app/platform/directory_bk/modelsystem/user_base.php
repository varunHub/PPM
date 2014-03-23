<?php namespace platform\directory\modelsystem;

use platform\core as Core;
use platform\directory\modelsystem as Base;
use platform\core\control as Ctl;
use Validator;

class user_base extends Core\coreFullModel implements Core\ICoreFullModel
{
	protected $table 			= 	'tbl_use_base';


    public function setup(){}

	public function generateForm()
	{
	}


	public function make()
    {
    	//parent::make();

    	$this->user_id		=	0;
		$this->user_name	=	'';
		$this->email		=	'';
		$this->password		=	'';
		$this->first_name	=	'';
		$this->last_name	=	'';
		$this->nick_name	=	'';
		$this->gender		=	'';
		$this->birth_date	=	'';
		$this->birth_month	=	'';
		$this->birth_year	=	'';
		$this->login_count	=	'';
		$this->last_login	=	'';
		$this->secret_key	=	'';
		$this->confirm_key	=	'';
		$this->last_ip		=	'';
		$this->country_id	=	'';
		$this->is_admin		=	'';
		$this->fb_id		=	'';
		$this->created_at	=	'';
		$this->created_by	=	'';
		$this->updated_by	=	'';
		$this->updated_at	=	'';
		$this->locked		=	'';
		$this->active		=	'';
		$this->online		=	'';
		$this->revision		=	'';
    }

     public function assign2($s)
    {

    }

    


	
}