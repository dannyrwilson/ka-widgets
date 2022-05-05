<div class="table-responsive mt-3">
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