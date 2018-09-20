@if(Session::has('message'))
<br>
<br>
<div class="col-md-6">
<div class="alert alert-success" role="alert">
	<p>{{Session::get('message')}}</p>
</div>
</div>
@endif