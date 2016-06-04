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
						<td>{!! $c->id!!}</td>
						<td>{!! $c->first_name!!}</td>
						<td>{!! $c->last_name!!}</td>
						<td>{!! $c->phone!!}</td>
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
		{!! Form::open(array('action'=>'CustomerController@store'))!!}
			First Name: {!! Form::text('first_name')!!}<br/>
			Last Name: {!! Form::text('last_name')!!} <br/>
			Phone: {!! Form::text('phone')!!}<br/>
        {!! Form::submit('Confirm')!!}
		{!! Form::close()!!}
	</div>
	
</body>
</html>



