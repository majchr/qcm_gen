@extends('layouts.app')





@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1>Question<img src="/img/edit.png" width="40" height="40"></h1>

			<form action="{{ url('qsts/'.$qst->id) }}" method="post" class="form-check">

				
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="enonce">Nouvelle question</label>
					<input type="text" class="form-control" name="enonce" value="{{ $qst->enonce }}">

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
							<input type="radio" class="form-check-input" name="avecchoix" value="1" @if($qst->avecchoix) checked @endif>Oui</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="avecchoix" value="0" @if(!$qst->avecchoix) checked @endif>Non</label>
					</div>

					@if($errors->get('avecchoix'))
						@foreach($errors->get('avecchoix') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif

				</div>


				<div class="form-group">
					<label for="comment">Commentaire</label>
					<textarea class="form-control" name="comment" >{{ $qst->commentaire }}</textarea>
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