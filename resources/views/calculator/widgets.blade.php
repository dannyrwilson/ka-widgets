@extends('template')

@section('page_contents')

<form action="{{ route('calculatorResult') }}" method="post">

	@csrf

	<div class="card">
		<div class="card-header">
			Widget Calculator
		</div>
		<div class="card-body">

			@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif
			<div class="form-group">
				<label for="widget_total">
					Number of Widgets ordered:
				</label>
				<input type="text" class="form-control" name="required_widgets" required placeholder="eg. 12345" />
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-calculate-widget btn-success">Calculate</button>
		</div>
	</div>

</form>

@endsection