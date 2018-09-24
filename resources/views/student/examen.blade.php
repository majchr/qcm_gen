@extends('layouts.app')




@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mb-3">
				<div class="card-header bg-light">
   
        
				<h3 class="font-weight-light" >{{ $qcm->titre }}</h3>
      

  				</div>
				<div class="card-body">
					<form action="{{ url('qcms/valider/qcm_id/'.$qcm->id.'/group_id/'.$group->id) }}" method="post" class="form-check">

				

				{{ csrf_field() }}

						@foreach($questions as $key => $question)
							<div class="card-body " style="margin-bottom: 10px;border-radius: 15px;border: 2px solid #95a5a6;">
								<H6>Question: {{$key+1}}</H6>
								<h5 class=" card bg-warning text-white" style="padding: 5px;border-radius: 10px;">{{ $question->enonce }}</h5>
								@foreach($question->choix as $choix)
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" name="choix[]" id="{{ $choix->id }}" value="{{ $choix->id }}">
										<label class="custom-control-label" for="{{ $choix->id }}"><h5 class="card-title ">{{ $choix->enonce }}</h5></label>
									</div>
								@endforeach
							</div>
						@endforeach
						<div class="float-right">
							<p>Total questions: {{$key+1}}</p>
						</div>
						<div class="form-group row mb-2">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary" >Valider</button>
                            </div>
                        </div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>





@endsection
