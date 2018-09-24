@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Liste de mes QCM</h1>

			<div class="float-right">
				<a href="{{ url('qcms/create') }}" class="btn btn-success">Nouveau Qcm</a>
			</div>
			<div  class="table-responsive">
			<table class="table table-bordred">
				<thead class="thead-dark">
					<tr>
						<th>Titre</th>
						<th>Introduction</th>
						<th>Bonne reponse</th>
						<th>Pas de reponse</th>
						<th>Mauvaise reponse</th>
						<th>Barème</th>
						<th>Partagée</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($qcms as $qcm)
					
				 	
					<tr>
						<td>{{ $qcm->titre }} <br>{{ $qcm->user->name }}</td>
						<td>{{ $qcm->introduction }}</td>
						<td>{{ $qcm->breponse }}</td>
						<td>{{ $qcm->preponse }}</td>
						<td>{{ $qcm->mreponse }}</td>
						<td>{{ $qcm->bareme }}</td>
						<td>@if( $qcm->partagee)
						Oui
						@else
						Non
					@endif</td>
						<td>
						
							<form action="{{ url('qcms/'.$qcm->id) }}" method="POST">
								
							
								
				 @csrf
								{{ method_field('DELETE') }}




								<a href="{{ url('qsts/index/'.$qcm->id) }}" class="btn btn-primary">Details</a>
							<a href="{{ url('qcms/edit/'.$qcm->id) }}" class="btn btn-warning">Editer</a>
							<a href="{{ url('qcms/fixer/'.$qcm->id) }}" class="btn btn-success">Périodes d'accès</a>
							@can('delete',$qcm)
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