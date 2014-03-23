<?php namespace platform\core;

use Controller;
use View;
use Input;
use DB;
use Illuminate\Database\Query;

abstract class coreController extends Controller implements ICoreController
{
	public $restful = true;

	protected $model_name;
	protected $json_model_key;
	protected $view_listing;
	protected $view_single;
	//protected $return_type	 = 0;

	private $key_field = 'id';
	
	public function __construct()
	{
		$this->setup();
	}

	public function get_list()
	{
		$_model = $this->model_name;
		$use_model = $_model::orderBy($this->key_field, 'desc')->paginate(10);
		return View::make($this->view_listing)
			-> with('title',  $this->model_title)
			-> with($this->json_model_key, $use_model)
			;
	}

	public function json_list($q = '')
	{
		$_model = $this->model_name;

		if (Input::has('q'))
		{
			$key = Input::get('q');
		}
		else
		{
			if (Input::has('query'))
			{
				$key = Input::get('query');
			}
			else
			{
				$key = "";
			}
		}

		return $_model::select($this->default_search_field)->where($this->default_search_field, 'like', '%' . trim($key) . '%')->get();

	}

	public function similar_json_list($key = null)
	{
		$_model = new $this->model_name;
		return json_encode($use_model['attributes']);
	}

	public function create_in_model_window($id=0)
	{

		$_model = $this->model_name;
		$use_model = $_model::find($id);
		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
		}

		$datax = "{" . $this->json_model_key .":[" . json_encode($use_model['attributes']) . "]}";
		return View::make($this->view_single)
			->with('datax', $datax)
			->with('core_all_active_status', json_encode($_model::$core_all_active_status))
			->with('no_layout', "")
			;
	}

	public function get_single($id)
	{
		$_model = $this->model_name;
		$use_model = new $_model;
		$use_model = $_model::find($id);
		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
		}

		$datax = "{" . $this->json_model_key .":[" . json_encode($use_model['attributes']) . "]}";


		return View::make($this->view_single)
			->with('datax', $datax)
			->with('core_all_active_status', json_encode($_model::$core_all_active_status))
			->with('controls', $use_model->generateForm())
			->with('page', $use_model->generateForm())
			->with('support_data', $use_model->support_data())
			;
		
	}

	public function support_data()
	{
		return array();
	}

	public function get_create()
	{
		return $this->get_single(0);
	}

	public function pst_single_save($id)
	{


		$input			= Input::all();
		$errors			= array();

		$input_model 	= $input['data'][$this->json_model_key];
		$_model 		= $this->model_name;

		foreach ($input_model as $s)
		{
			$validation = $_model::validate($s);
			if ($validation->fails())
			{
				die('{"error":[{"message":"' . implode($validation->messages()->all(),'"},{"message":"') . '"}]}');
			}
		}		

		foreach ($input_model as $s)
		{
			$lKey =0 ;
			if (isset($s[$this->key_field]))
			{
				$lKey = $s[$this->key_field];
			}
		
			$_model = $this->model_name;
			$use_model = $_model::find($lKey);
			
			if (is_null($use_model))
			{
				$use_model = new $_model;
				$use_model->make();
			}
			else
			{
				$use_model->exists = true;
			}
			
			$use_model->assign2($s);
			$use_model -> save();
			$base_id = $use_model -> id;
		}

		if (Input::has('return'))
		{
			echo "{" . $this->json_model_key . ":[" . json_encode($use_model['attributes']) . "]}";
		}
		else
		{
			echo json_encode($use_model['attributes']);
		}
		exit ;
	}


/*
http://laravel.com/docs/controllers#resource-controllers

GET			/resource			index	resource.index
GET			/resource/create	create	resource.create
POST		/resource			store	resource.store
GET			/resource/{id}		show	resource.show
GET			/resource/{id}/edit	edit	resource.edit
PUT/PATCH	/resource/{id}		update	resource.update
DELETE		/resource/{id}		destroy	resource.destroy
*/
	public function index()
	{
		return $this->get_list();
	}
	public function create()
	{
		return $this->get_single(0);
	}
	public function store($id)
	{
		
	}
	public function show($id)
	{
		return $this->get_single($id);
	}
	public function edit()
	{
		echo "edit - sda sa ds";
	}
	public function update($id)
	{
	//	return $this->pst_single_save($id);
	}
	public function destroy()
	{
		echo "destroy";
	}

	//abstract protected function assign($s);
	abstract protected function setup();
}

interface ICoreController
{
	//abstract protected function get_list();
	//protected function get_single($id);
}