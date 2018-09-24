@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mb-3">
				<div class="card-header bg-light">
					<div class="float-right"><h2>{{ $moyenne }}/{{ $qcm->bareme }}</h2></div>
        
				<h3 class="font-weight-light" >{{ $qcm->titre }}</h3>
      

  				</div>
				<div class="card-body">
					

				

						@foreach($questions as $key => $question)
							<div class="card-body " style="margin-bottom: 10px;border-radius: 15px;border: 2px solid #95a5a6;">
								<H6>Question: {{$key+1}}</H6>
								<h5 class=" card bg-warning text-white" style="padding: 5px;border-radius: 10px;">{{ $question->enonce }}</h5>
								
								@foreach($question->choix as $choix)
								
								@if($choix->is_correct)
								
								

									<div class="custom-control custom-checkbox">
										
										<input type="checkbox" class="custom-control-input" name="choix" @if(in_array($choix->id,$request)) checked @endif disabled> 
										
										<label class="custom-control-label" for="choix"><h5 class="card-title ">{{ $choix->enonce }}</h5></label><img src="/img/true.png" width="30" height="30">
									</div>
									
									@else
									<div class="custom-control custom-checkbox">
										
										<input type="checkbox" class="custom-control-input" name="choix" @if(in_array($choix->id,$request)) checked @endif disabled>
										<label class="custom-control-label" for="choix"><h5 class="card-title ">{{ $choix->enonce }}</h5></label><img src="/img/false.png" width="30" height="30">
									</div>
									@endif
									
								@endforeach
							</div>
						@endforeach
						<div class="float-right">
							<p>Total questions: {{$key+1}}</p>
						</div>
						
					</form>
				</div>
			</div>

		</div>
	</div>
</div>





@endsection
