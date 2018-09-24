@extends('layouts.app')




@section('content')



<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h2 style="color: red">{{ $group->titre }}</h2>

			<div  class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Nom</th>
						<th>E-mail</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($students as $student)
					
				 	
					<tr>
						<td>{{ $student->name }} </td>
						<td>{{ $student->email }}</td>
					
						<td>@if($student->pivot->allow==1)

						Confirmer
						@else
						En attente
					@endif</td>
						<td>
						
						<form action="{{ url('groups/'.$group->id.'/'.$student->id) }}" method="POST">
				<input type="hidden" name="_method" value="PUT">
							{{ csrf_field() }}

							@if($student->pivot->allow==1)

								<a href="{{ url('groups/'.$group->id.'/'.$student->id) }}" class="btn btn-primary disabled" >Confirmer</a>
							@else
							
                                <button type="submit" class="btn btn-primary" >Confirmer</button>
							
							@endif
							
							</form>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>







@endsection