@extends('template')

@section('page_contents')


<div class="card">
	<div class="card-header">
		Widget Result
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>
							Required Widgets
						</th>
						<th>
							Packs to Send
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							{{ $requiredWidgets }}
						</td>
						<td>
							@foreach($packs as $pack) 
								{{ $pack['packSize'] }}  x {{ $pack['packQuantity'] }}<br />
							@endforeach
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	<div class="card-footer">
		<a href="{{ route('calculatorIndex') }}" class="btn btn-calculate-widget btn-success">Back</a>
	</div>
</div>

@endsection