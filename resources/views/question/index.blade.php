@extends('layouts.app')





@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Question<img src="/img/add.png" width="40" height="40"></h1>

			<form action="{{ url('qsts/store/'.$qcm->id) }}" method="post" class="form-check">

				
				{{ csrf_field() }}
			<div class="form-group">
					<label for="enonce">Nouvelle question</label>
					<input type="text" class="form-control" name="enonce" value="{{ old('enonce') }}">

					@if($errors->get('enonce'))
						@foreach($errors->get('enonce') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label>Plusieurs réponses possibles</label>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="avecchoix" value="1" >Oui</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="avecchoix" value="0">Non</label>
					</div>

					@if($errors->get('avecchoix'))
						@foreach($errors->get('avecchoix') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif

				</div>


				<div class="form-group">
					<label for="comment">Commentaire</label>
					<textarea class="form-control" name="comment" >{{ old('commentaire') }}</textarea>
					@if($errors->get('comment'))
						@foreach($errors->get('comment') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
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
						<th>Question</th>
						<th>Avec choix</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($questions as $qst)
					
				 	
					<tr>
						<td>{{ $qst->enonce }}</td>
						<td>@if( $qst->avecchoix)
						Oui
						@else
						Non
					@endif</td>

						<td>
						
							<form action="{{ url('qsts/'.$qst->id) }}" method="POST">
								
							
								
				 @csrf
								{{ method_field('DELETE') }}

							<a href="{{ url('choix/'.$qst->id) }}" class="btn btn-primary">Details</a>
							<a href="{{ url('qsts/edit/'.$qst->id) }}" class="btn btn-warning">Editer</a>
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