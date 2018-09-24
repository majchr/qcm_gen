@extends('layouts.app')



@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">

			@if(session()->has('success'))

				<div class="alert alert-success"> {{ session()->get('success') }} </div>

			@endif

			<h2 style="color: red">{{ $group->titre }}</h2>
			<form action="{{ url('groups/'.$group->id) }}" method="POST">


				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}


				<div class="form-group">
					<label for="titre">Titre</label>
					<input type="text" class="form-control" name="titre" value="{{ $group->titre }}" >

					@if($errors->get('titre'))
						@foreach($errors->get('titre') as $message)
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


