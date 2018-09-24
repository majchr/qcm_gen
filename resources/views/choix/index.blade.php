@extends('layouts.app')





@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Choix<img src="/img/add.png" width="40" height="40"></h1>

			<form action="{{ url('choix/store/'.$question->id) }}" method="post" class="form-check">

				
				{{ csrf_field() }}
				<div class="form-group">
					<label for="enonce">Nouvelle choix</label>
					<input type="text" class="form-control" name="enonce" value="{{ old('enonce') }}">

					@if($errors->get('enonce'))
						@foreach($errors->get('enonce') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label>Réponse correcte</label>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="is_correct" value="1" >Oui</label>
							@if($errors->get('is_correct'))
						@foreach($errors->get('is_correct') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="is_correct" value="0">Non</label>
					</div>


					

				</div>


				<div class="form-group row mb-2">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary" >Ajouter</button>
                            </div>
                        </div>			
			</form>




		


				<div  class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Choix</th>
						<th>Réponse correcte</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($choix as $chx)
					
				 	
					<tr>
						<td>{{ $chx->enonce }}</td>
						<td>@if( $chx->is_correct)
						Oui
						@else
						Non
					@endif</td>

						<td>

						<form action="{{ url('choix/'.$chx->id) }}" method="POST">
								
							
								
				 @csrf
								{{ method_field('DELETE') }}

							<a href="{{ url('choix/edit/'.$chx->id) }}" class="btn btn-warning">Editer</a>
							<button type="submit" class="btn btn-danger">Supprimer</button>
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