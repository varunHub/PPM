@extends('Message.View.layout.message_base')


@section('heading')
View All
@stop


@section('content')
<div class="container">
<table class='table table-bordered table-striped table-condensed table-hover'>
	<thead>
		<tr>
			<th>#ID</th>
			<th width=300>Subject</th>
			<th>From</th>
			<th>Time</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($topic_base as $r)
		<tr>
			<td>{{ $r->topic_id}}</td>
			<td>{{ $r->title }}</td>
			<td>{{ $r->updated_by }}</td>
			<td>{{ $r->updated_at }}</td>
			 	
		</tr>
		@endforeach


	</tbody>
</table> 
</div>
@stop