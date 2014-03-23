<form class="form-horizontal" role="form" action="{{$act_url}}" method="post">
	<div class="modal fade" {{"id='".$classname."'"}} tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">{{$msg_title}}</h4>
	      </div>
	      <div class="modal-body">
	      {{$msg_body}}
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="sbmit" class="btn btn-primary">Confirm</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->								
</form>