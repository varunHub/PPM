@extends('SysSetting.View.layout.admin_base_bs3')

@section('nav_bar')
    <li class="active"><a href="{{$app_url}}/Admin/setting/new">New</a></li>
    <li ><a href="{{$app_url}}/Admin/setting">ListView</a></li>
@stop


@section('content')
<div class="container">
<form class="form-horizontal" role="form" action="{{$app_url}}/Admin/setting/{{$resData->id}}" method="POST" >
  <input type="hidden" name="id" class="form-control" id="id" value="{{ $resData->id }}">
  <div class="form-group">
    <label for="input_site_id" class="col-sm-2 control-label">Site Id</label>
    <div class="col-sm-10">       
      <input type="text" name="site_id" class="form-control" id="input_site_id" placeholder="site id -number" value="{{ $resData->site_id }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_sys_type" class="col-sm-2 control-label">System Type</label>
    <div class="col-sm-10">
      <input type="text" name="sys_type" class="form-control" id="input_sys_type" placeholder="sys type -number" value="{{ $resData->sys_type }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_module" class="col-sm-2 control-label">Module</label>
    <div class="col-sm-10">
      <input type="text" name="module" class="form-control" id="input_module" placeholder="module" value="{{ $resData->module }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_section" class="col-sm-2 control-label">Section</label>
    <div class="col-sm-10">
      <input type="text" name="section" class="form-control" id="input_section" placeholder="section" value="{{ $resData->section }}">
    </div>
  </div>
   <div class="form-group">
    <label for="input_key_name" class="col-sm-2 control-label">Key Name</label>
    <div class="col-sm-10">
      <input type="text" name="key_name" class="form-control" id="input_key_name" placeholder="key name" value="{{ $resData->key_name }}">
    </div>
  </div>
  <div class="form-group">
    <label for="input_key_type" class="col-sm-2 control-label">Key Type</label>
    <div class="col-sm-10">
      <select name ="key_type" class="form-control" id="key_type">
          <option value="Integer">Integer</option>
          <option value="Boolean">Boolean</option>
          <option value="Double">Double</option>
          <option value="String" selected>String</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_key_value" class="col-sm-2 control-label">Key Value</label>
    <div class="col-sm-10">
      <input type="text" name="key_value" class="form-control" id="input_key_value" placeholder="key value" value="{{ $resData->key_value }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
      <div class="alert alert-success" style=<?php if (!isset($status) || $status != 'Success'){echo '"display: none"';} ?>>  
        <a class="close" data-dismiss="alert">×</a>  
        <strong>Message : </strong>Data saved successfully.  
      </div>
      <div class="alert alert-error" style=<?php if (!isset($status) || $status != 'fail'){echo '"display: none"';} ?>>  
        <a class="close" data-dismiss="alert">×</a>  
        <strong>Error : </strong><?php echo "<br>".$error; ?>  
      </div>

      
    </div>
  </div>
</form>
</div>

<script type="text/javascript">
var n = "{{ $resData->key_type }}";
switch(n)
{
case 'Integer':
  document.getElementById('key_type').getElementsByTagName('option')[0].selected = 'selected';
  break;
case 'Boolean':
  document.getElementById('key_type').getElementsByTagName('option')[1].selected = 'selected';
  break;
case 'Double':
  document.getElementById('key_type').getElementsByTagName('option')[2].selected = 'selected';
  break;
default:
  document.getElementById('key_type').getElementsByTagName('option')[3].selected = 'selected';
}


</script>
@stop 





