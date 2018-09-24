@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Liste de QCM partagées</h1>

			
			<div  class="table-responsive">
			<table class="table">
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
						<td>{{ $qcm->titre }}</td>
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
						<a href="{{ url('qcms/catalogue/consulter/'.$qcm->id) }}" class="btn btn-primary">Consulter</a>
						
							
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