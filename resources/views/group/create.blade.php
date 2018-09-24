@extends('layouts.app')







@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Nouveau Group</h2>
			<form action="{{ url('groups') }}" method="post" class="form-check">

				{{ csrf_field() }}
				<div class="form-group">
					<label for="titre">Titre</label>
					<input type="text" class="form-control" name="titre" value="{{ old('titre') }}">

					@if($errors->get('titre'))
						@foreach($errors->get('titre') as $message)
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
		</div>
	</div>
</div>




@endsection


