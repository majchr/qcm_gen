@extends('layouts.app')



@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Fixer période d'accès <img src="/img/clock.png" width="40" height="40"></h2>
			<form action="{{ url('qcms/fixerdate/'.$qcm->id) }}" method="post" class="form-check">

				{{ csrf_field() }}
				<div class="form-group ">
						<div class="col-auto">
							<label class="mr-sm-2" for="qcm">QCM</label>
							<select class="custom-select mr-sm-2" name="qcm" disabled>
									<option value="{{ $qcm->id }}" >{{ $qcm->titre }}</option>
      						</select>
    					</div>
    				</div>
					<div class="form-group ">
						<div class="col-auto">
							<label class="mr-sm-2" for="group">Group</label>
							<select class="custom-select mr-sm-2" name="group">
								@foreach($groups as $group)
									<option value="{{ $group->id }}">{{ $group->titre }}</option>
        						@endforeach
      						</select>
    					</div>
    				</div>

    				<div class="form-group">
  						<label for="date_debut" class="col-2 col-form-label">Date debut</label>
  						<div class="col-12">
  							<input type="hidden" name="current_date" value="<?php echo date('H:i:s M d, Y'); ?>" readonly="readonly">
    							<input class="form-control" type="datetime-local"  name="date_debut">
  						</div>
  						@if($errors->get('date_debut'))
						@foreach($errors->get('date_debut') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
  					</div>
  					<div class="form-group">
  						<label for="date_fin" class="col-2 col-form-label">Date fin</label>
  						<div class="col-12">
    							<input class="form-control" type="datetime-local"  name="date_fin">
  						</div>
  						@if($errors->get('date_fin'))
						@foreach($errors->get('date_fin') as $message)
							<span style="color: red"><li>{{ $message }}</li></span>
						@endforeach
					@endif
  					</div>
					<div class="form-group">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-info" >Ajouter la période</button>
                            </div>
                	</div>	
           
			</form>
		</div>
	</div>
</div>




@endsection


