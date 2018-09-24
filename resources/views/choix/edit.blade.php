@extends('layouts.app')





@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Choix<img src="/img/edit.png" width="40" height="40"></h1>

			<form action="{{ url('choix/'.$chx->id) }}" method="post" class="form-check">

				
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="enonce">Nouvelle choix</label>
					<input type="text" class="form-control" name="enonce" value="{{ $chx->enonce }}">

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
							<input type="radio" class="form-check-input" name="is_correct" value="1" @if($chx->is_correct) checked @endif>Oui</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="is_correct" value="0" @if(!$chx->is_correct) checked @endif>Non</label>
					</div>

					@if($errors->get('is_correct'))
						@foreach($errors->get('is_correct') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif

				</div>

				<div class="form-group row mb-2">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-danger" >Modifier</button>
                            </div>
                        </div>			
			</form>

					</div>
	</div>
</div>





@endsection