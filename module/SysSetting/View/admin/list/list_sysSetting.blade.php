@extends('SysSetting.View.layout.admin_base_bs3')

@section('nav_bar')
    <li><a href="{{$app_url}}/Admin/setting/new">New</a></li>
    <li class="active"><a href="{{$app_url}}/Admin/setting">ListView</a></li>
@stop


@section('content')
<div class="container">
<table class='table table-bordered table-striped table-condensed table-hover'>
	<thead>
		<tr>
			<th>#ID</th>
			<th>Site Id</th>
			<th>System Type</th>
			<th>Module</th>
			<th>Section</th>
			<th>Key Name</th>
			<th>Key Type</th>
			<th>Key Value</th>
			<th>Created by</th>
			<th>Created at</th>
			<th>Updated by</th>
			<th>Updated at</th>
			<th>Active Status</th>
			<th>Lock Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($sysSetting as $r)
		<tr>
			<td>{{link_to('/Admin/setting/'.$r->id, '#'.$r->id, $attributes = array(), $secure = null);}}</td>
			<td>{{ $r->site_id }}</td>
			<td>{{ $r->sys_type }}</td>
			<td>{{ $r->module }}</td>
			<td>{{ $r->section }}</td>
			<td>{{ $r->key_name }}</td>
			<td>{{ $r->key_type }}</td>
			<td>{{ $r->key_value }}</td>
			<td>{{ $r->created_by }}</td>
			<td>{{ $r->created_at }}</td>
			<td>{{ $r->updated_by }}</td>
			<td>{{ $r->updated_at }}</td>
			<td>{{ $r->getActive() }}</td>
			<td>{{ $r->getLock() }}</td>
			 	
		</tr>
		@endforeach
	</tbody>
</table> 
{{ $sysSetting->links() }}
</div>
@stop 

