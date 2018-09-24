@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mb-3">
				<div class="card-header bg-light">
   
      	<div class="float-right">
				<a href="{{ url('qcms/partager/'.$qcm->id) }}" class="btn btn-success">Partager</a>
			</div>
        
				<h3 class="font-weight-light" >{{ $qcm->titre }}</h3>
      

  </div>
				<div class="card-body">

					@foreach($questions as $key => $question)
					<div class="card-body " style="margin-bottom: 10px;border-radius: 15px;border: 2px solid #95a5a6;">
						<H6>Question: {{$key+1}}</H6>
					<h5 class=" card bg-warning text-white" style="padding: 5px;border-radius: 10px;">{{ $question->enonce }}</h5>
					 @foreach($question->choix as $choix)
					<div class="custom-control custom-checkbox">
						
						

						<label class="custom-control-label" for="customCheck1"><h5 class="card-title ">{{ $choix->enonce }}</h5></label>
					
					</div>					
					@endforeach
				</div>
					@endforeach
					<div class="float-right">
					<p>Total questions: {{$key+1}}</p>
				
			</div>
				</div>
			</div>

		</div>
	</div>
</div>





@endsection
