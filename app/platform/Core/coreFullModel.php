<?php namespace platform\core;

use Eloquent;
use Validator;

abstract class coreFullModel extends Eloquent implements ICoreFullModel
{
    public static $validationMessages = null;
    public static $validationMessagesJson = null;
    public static $input = null;
    public static $active   =1;
    public static $locked   =0;
    public static $updated_by   =0;

    public $timestamps = true;

    public function __construct()
    {
        // $this->setup();
    }

    //abstract protected function setup(); 
    abstract protected function make(); 
    abstract function assign2($s);
    abstract function generateForm();
    

    
    public static function validate($input = null)
    {
        if (is_null($input))
        {
            $input = Input::all();
        }

        $v = Validator::make($input, static::createValidationRules($input['id']));
        return $v;
    }

    /**
     * Get validation rules and take care of own id on update
     * @param int $id
     * @return array
     */
    public static function createValidationRules($id = null)
    {
        $rules = static::$rules;
 
        if($id === null)
        {
            return $rules;
        }
 
        array_walk($rules, function(&$rules, $field) use ($id)
        {
            if(!is_array($rules))
            {
                $rules = explode("|", $rules);
            }
 
            foreach($rules as $ruleIdx => $rule)
            {
                // get name and parameters
                @list($name, $params) = explode(":", $rule);
 
                if(strtolower($name) != "unique") {
                    continue; // continue in foreach loop, nothing left to do here
                }
                $p = array_map("trim", explode(",", $params));
 
                if(!isset($p[1])) {
                    $p[1] = $field;
                }
 
                // set 3rd parameter to id given to getValidationRules()
                $p[2] = $id;
                $params = implode(",", $p);
                $rules[$ruleIdx] = $name.":".$params;
            }
        });
 
        return $rules;
    }


public function support_data()
{
    return array();
}


    public static $core_all_active_status = array(
        array("id"=> 1,      "title"=>"Active"),
        array("id"=> 0,    "title"=>"Off Line"),
    );
    
}

interface ICoreFullModel
{
    //abstract protected function setup();
    //abstract protected function make();
}