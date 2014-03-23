<?php namespace platform\directory\modelsystem;

use platform\core as Core;
use platform\directory\modelsystem as Base;
use platform\core\control as Ctl;
use Validator;

class sysSetting extends Core\coreFullModel implements Core\ICoreFullModel
{
	protected $table 			= 	'tbl_sys_setting';
	public $def_id				=	0;
	public static $search_key	=	'key_type';
	public static $search_value	=	'';

	public static function setSearchkey($search_key) {
        static::$search_key = $search_key;
    }

    public static function getSearchkey() {
        return static::$search_key;
    }

    public static function setSearchVal($search_value) {
        static::$search_value = $search_value;
    }

    public static function getSearchVal() {
        return static::$search_value;;
    }
   

	public static $messages = array(
    'site_id.required'    	=> 'The :attribute is required.',
    'sys_type.required'   	=> 'The :attribute is required.',
    'site_id.integer'     	=> 'The :attribute must be integer ( integer )..',
    'sys_type.integer'    	=> 'The :attribute must be number ( integer ).',
    'key_value.integer'    	=> 'The :attribute must be number ( integer ).',
    'key_value.in'=> 'The :attribute must be true or false.',
	);


    public function setup(){}

    

	public static function validateData($d)
    {
    	# your validation rules here
    	$datype=$d["key_type"];
    	

    	switch ($datype) 
    	{
		    case 'Integer':
		        $key_value_rule = 'integer';
		        break;

		    case 'Boolean':
		        $d["key_value"] = strtolower($d["key_value"]);
    			$key_value_rule = 'required|in:true,false';
		        break;

		    case 'Double':
		        $key_value_rule = 'numeric';
		        break;

		    default:
       			$key_value_rule = "max:100";
		}
    	
    	$rules = array(
        
		'site_id'		=> 'required|integer',
		'sys_type'		=> 'required|integer',
		'key_value'		=>	$key_value_rule,
		'key_name' 		=> 'unique:tbl_sys_setting,site_id,module,sys_type,section,key_name',
    	);

    	$messages 	= static::$messages;
    	$validator 	= Validator::make($d, $rules, $messages);


    	return $validator;
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

    public function getActive()
    {
    	if($this->active == 1)
    	{
    		return 'Active';
    	}
    	else
    	{
    		return 'Removed';
    	}
    }

    public function getLock()
    {
    	if($this->locked == 0)
    	{
    		return 'Lock';
    	}
    	else
    	{
    		return 'Unlock';
    	}
    }

    public function assign2($s)
    {

    }
    public function assignValues($input)
	{
		$this->id			= $input['id'];
		$this->site_id		= $input['site_id'];
		$this->sys_type		= $input['sys_type'];
		$this->module 		= $input['module'];
		$this->section 		= $input['section'];
		$this->key_name 	= $input['key_name'];
		$this->key_type 	= $input['key_type'];
		$this->key_value 	= $input['key_value'];
		
		if (isset($input['created_by']))
		{
			$this->created_by 	= $input['created_by'];
		}
		if (isset($input['updated_by']))
		{
			$this->updated_by 	= $input['updated_by'];
		}
		if (isset($input['active']))
		{
			$this->active 		= $input['active'];
		}
		if (isset($input['locked']))
		{
			$this->locked 		= $input['locked'];
		}
		
	}

	public function generateForm()
	{
	}

	public function isActive($module)
	{
		return true;
	}


	
}