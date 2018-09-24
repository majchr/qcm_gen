@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Liste de mes groupes</h1>

			<div class="float-right">
				<a href="{{ url('groups/create') }}" class="btn btn-success">Ajouter group</a>
			</div>
			<div  class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Nom</th>
						<th>code d'inscription</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($groups as $group)
					
				 	
					<tr>
						<td>{{ $group->titre }} <br>{{ $group->user->name }}</td>
						<td>{{ $group->code }}</td>
						<td>
						
							<form action="{{ url('groups/'.$group->id) }}" method="POST">
								
							
								
				 @csrf
								{{ method_field('DELETE') }}

								




								<a href="{{ url('groups/listetudiants/'.$group->id) }}" class="btn btn-primary">Details</a>
							<a href="{{ url('groups/edit/'.$group->id) }}" class="btn btn-warning">Editer</a>
							@can('delete',$group)
							<button type="submit" class="btn btn-danger">Supprimer</button>
				@endcan
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