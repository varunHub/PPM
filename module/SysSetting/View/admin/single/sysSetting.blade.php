@extends('SysSetting.View.layout.admin_base_bs3')


@section('nav_bar')
    <li ><a href="{{$app_url}}/Admin/setting/create">Create</a></li>
    <li ><a href="{{$app_url}}/Admin/setting">ListView</a></li>
    <li class="active"><a href="#">SingleView</a></li>
@stop

@section('content')
<div class="container">
  <td><h3>Admin Setting - Single view</h3>
<table class='table-bordered table-condensed '>
	<tbody>
			<tr><td><b>ID</b></td><td>{{ $resData->id }}</td></tr>
			<tr><td><b>Site Id</b></td><td>{{ $resData->site_id }}</td></tr>
			<tr><td><b>System Type</b></td><td>{{ $resData->sys_type }}</td></tr>
			<tr><td><b>Module</b></td><td>{{ $resData->module }}</td></tr>
			<tr><td><b>Section</b></td><td>{{ $resData->section }}</td></tr>
			<tr><td><b>Key Name</b></td><td>{{ $resData->key_name }}</td></tr>
			<tr><td><b>Key Type</b></td><td>{{ $resData->key_type }}</td></tr>
			<tr><td><b>Key Value</b></td><td>{{ $resData->key_value }}</td></tr>
			<tr><td><b>Created By</b></td><td>{{ $resData->created_by }}</td></tr>
			<tr><td><b>Created At</b></td><td>{{ $resData->created_at }}</td></tr>
			<tr><td><b>Updated By</b></td><td>{{ $resData->updated_by }}</td></tr>
			<tr><td><b>Updated At</b></td><td>{{ $resData->updated_at }}</td></tr>
      <tr>
        <td><b>Active Status</b></td>
        <td>{{ $resData->getActive()."    " }}
          @if($resData->active == 1)
          <a href="" data-toggle="modal" data-target="#myModal_Active">remove</a>
          @endif
        </td>
      </tr>
      <tr>
        <td><b>Lock Status</b></td>
        <td>{{ $resData->getLock()."    " }}
          <a href="" data-toggle="modal" data-target="#myModal_Lock">change</a>
        </td>
      </tr>
	</tbody>
</table>
@if($resData->locked == 1)
<form class="form-horizontal" role="form" action="{{$app_url}}/Admin/setting/{{$resData->id}}/edit" method="post">
     <button type="submit" class="btn btn-info">Edit</button>
  </form>
</div>
@endif
@stop 
@include('SysSetting.View.layout.admin_popup_confirm', array('msg_title' => 'Change Lock Status','msg_body' => 'Are you going to change the lock status?','classname'=>'myModal_Lock','act_url'=>$app_url.'/Admin/setting/'.$resData->id.'/chgLock'))
@include('SysSetting.View.layout.admin_popup_confirm', array('msg_title' => 'Remove data','msg_body' => 'Are you going to Remove?','classname'=>'myModal_Active','act_url'=>$app_url.'/Admin/setting/'.$resData->id.'/remove'))