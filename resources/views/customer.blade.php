<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    @yield('head')

</head>
<body>
	<div class="container">
		<div class="row">
			<table>
				<thead>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($customers as $c)
					<tr>
						<td>{{ $c->id }}</td>
						<td>{{ $c->first_name }}</td>
						<td>{{ $c->last_name}}</td>
						<td>{{ $c->phone }}</td>
						<td>
							<button><a href="/customer/edit/{!! $c->id!!}">Edit</a></button>
							<button><a href="/customer/delete/{!! $c->id!!}">Delete</a></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>	
	<div class="row">
		<br/><br/>
	</div>
	<div class="container">
		<form action="{{ URL::to('/customer')."/store" }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="form-horizontal">
				<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					First Name:<input type="text" name="first_name" id="first_name" value="{{ old('first_name')}}">
					@if($errors->has('first_name'))
						<span class="text-danger">
							<strong>{{ $errors->first('first_name') }}</strong>
						</span>
					@endif					
				</div> 
				<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
					Last Name:<input type="text" name="last_name" id="last_name" value="{{ old('last_name')}}">
					@if($errors->has('last_name'))
						<span class="text-danger">
							<strong>{{ $errors->first('last_name') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
					Phone:<input type="text" name="phone" id="phone" value="{{ old('phone') }}">
					@if($errors->has('phone'))
						<span class="text-danger">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
					@endif
				</div>	
				
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">
				</label>					
				<input type="submit" value="Save"  class="btn btn-success">
			</div>
		</form>
	</div>
</body>
</html>



