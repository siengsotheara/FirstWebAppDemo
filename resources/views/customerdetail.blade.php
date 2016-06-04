<form method="post" action="{{ URL::to('/customer')."/update" }}" accept-charset="UTF-8" enctype="multipart/form-data">
	<div class="form-horizontal" >
		<div class="form-group" >
			<div class="col-sm-10">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" name="id"  value="{{ $customers->id }}">
				First name:<input type="text" class="form-control" id="" name="first_name" value="{{ $customers->first_name }}"/><br/>
				Last name:<input type="text" class="form-control" id="" name="last_name" value="{{ $customers->last_name }}"/> <br/>
				Phone:<input type="text" class="form-control" id="" name="phone" value="{{ $customers->phone }}"/> <br/>
			</div>
		</div>
			<!-- submit button-->
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
				<div class="col-sm-5">
					<input type="submit" value="Save"  class="btn btn-success">
					<a href="{{ URL::to('/customer') }}" class="btn btn-success">Back</a>
				</div>
		</div>
	</div>
</form>
