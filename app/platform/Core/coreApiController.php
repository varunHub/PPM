<?php namespace platform\core;

use Controller;
use View;
use Input;

abstract class coreApiController extends Controller implements IcoreApiController
{
	public $restful = true;

	protected $model_name;
	protected $json_model_key;
	protected $view_listing;
	protected $view_single;
	
	private $key_field = 'id';
	
	public function __construct()
	{
		//$this->setup();
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
	
	}
	public function destroy()
	{
		echo "destroy";
	}

}

interface IcoreApiController
{
}