View All Topic : User:username

<table border="1" width="100%">
<tr>
		<th>Topic_id</t>
		<th>Title</th>
		<th>Updated_by</th>
</tr>
@foreach($user as $r)
	<tr>
		<td>{{ $r->topic_id}}</td>
		<td>{{ $r->title}}</td>
		<td>{{ $r->updated_by}}</td>
	</tr>
@endforeach
</table>
