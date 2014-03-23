<?php namespace platform\directory\modelsystem;

use platform\core as Core;
use platform\directory\modelsystem as Base;
use platform\core\control as Ctl;
use Validator;

class topic_base extends Core\coreFullModel implements Core\ICoreFullModel
{
	protected $table 			= 	'tbl_topic_base';


    public function setup(){}

	public function generateForm()
	{
	}


	public function make()
    {
    	//parent::make();
    	$this->id	  	= $this->def_id;	 	 	 	 	 	 	 	 	 	 	 	 
		$this->site_id		= '';
		$this->sys_type		= '';
		$this->module 		= '';
		$this->section 		= '';
		$this->key_name 	= '';
		$this->key_type 	= '';
		$this->key_value 	= '';
		$this->created_by 	= $_SESSION['UID'];
		$this->updated_by 	= $_SESSION['UID'];
		$this->active 		= 1;
		$this->locked 		= 0;
    }

     public function assign2($s)
    {

    }

    


	
}