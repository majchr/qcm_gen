@extends('layouts.app')



@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Nouveau QCM<img src="/img/add.png" width="40" height="40"></h2>
			<form action="{{ url('qcms') }}" method="post" class="form-check" enctype="multipart/form-data">

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

				<div class="form-group">
					<label for="introduction">Introduction</label>
					<textarea class="form-control" name="introduction" >{{ old('introduction') }}</textarea>
					@if($errors->get('introduction'))
						@foreach($errors->get('introduction') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label for="breponse">Bonne réponse</label>
					<input type="text" class="form-control" name="breponse" value="{{ old('breponse') }}">
					@if($errors->get('breponse'))
						@foreach($errors->get('breponse') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label for="preponse">Pas de réponse</label>
					<input type="text" class="form-control" name="preponse" value="{{ old('preponse') }}">
					@if($errors->get('preponse'))
						@foreach($errors->get('preponse') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label for="mreponse">Mauvaise réponse</label>
					<input type="text" class="form-control" name="mreponse" value="{{ old('mreponse') }}">
					@if($errors->get('mreponse'))
						@foreach($errors->get('mreponse') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>


				<div class="form-group">
					<label for="bareme">Note sur</label>
					<input type="number" max="100" min="5" class="form-control" name="bareme" value="{{ old('bareme') }}">
					@if($errors->get('bareme'))
						@foreach($errors->get('bareme') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
				</div>

				<div class="form-group">
					<label>Partager ce QCM</label>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="partagee" value="1" >Oui</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="partagee" value="0">Non</label>
					</div>

					@if($errors->get('partagee'))
						@foreach($errors->get('partagee') as $message)
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


