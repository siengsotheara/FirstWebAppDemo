@extends('master')
@section('body')	
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customer</div>
                <div class="panel-body">
                	<form action="{{ URL::to('/customer')."/store" }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
						<div class="form-horizontal">
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<label for="text" class="col-md-4 control-label">First Name</label>
							<input type="text" name="first_name" id="first_name" value="{{ old('first_name')}}">
							@if($errors->has('first_name'))
								<span class="text-danger">
									<strong>{{ $errors->first('first_name') }}</strong>
								</span>
							@endif					
						</div> 
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label for="text" class="col-md-4 control-label">Last Name</label>
							<input type="text" name="last_name" id="last_name" value="{{ old('last_name')}}">
							@if($errors->has('last_name'))
								<span class="text-danger">
									<strong>{{ $errors->first('last_name') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="text" class="col-md-4 control-label">Phone Number</label>
							<input type="text" name="phone" id="phone" value="{{ old('phone') }}">
							@if($errors->has('phone'))
								<span class="text-danger">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>	
					</div>
					<div class="form-group">
						<div class="form-group">
		                    <div class="col-md-6 col-md-offset-4">
		                        <button type="submit" class="btn btn-primary">
		                            <i class="fa fa-btn fa-sign-in"></i>Save
		                        </button>
		                    </div>
		                </div>
					</div>
					</form>
                </div>
            </div>
        </div> 
    </div> 
</div>
@endsection