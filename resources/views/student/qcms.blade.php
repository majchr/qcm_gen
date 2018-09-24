@extends('layouts.app')



@section('content')



<div class="container">
	<div class="row">
		<div class="col-md-12">

	@foreach($qcms as $key => $qcm)
	
@if(!is_null($qcm))
@foreach($qcm as $qcmt)
<div class="card text-white bg-info mb-3 " style="max-width: 18rem;">
  <div class="card-header"> @if(($qcmt->pivot->date_debut > Carbon\Carbon::now())||($qcmt->pivot->date_fin < Carbon\Carbon::now()))
  <a href="{{ url('qcms/examen/'.$qcmt->id) }}" class="btn btn-dark disabled" >{{$qcmt->titre}}</a> @else <a href="{{ url('qcms/examen/qcm_id/'.$qcmt->id.'/group_id/'.$qcmt->pivot->group_id) }}" class="btn btn-dark " >{{$qcmt->titre}}</a>@endif

    </div>
  <div class="card-body">
    <h5 class="card-title">Date debut: <h4>{{Carbon\Carbon::now()}}</4></h5>
    <h5 class="card-title">Date debut: <h4>{{$qcmt->pivot->date_debut}}</4></h5>
    <h5 class="card-title">Date fin: <h4>{{$qcmt->pivot->date_fin}}</4></h5>
    	
  </div>
</div>

@endforeach
@endif
@endforeach

</div></div></div>




@endsection


<!-- ||((in_array($qcmt->id,$req)))&&(in_array($qcmt->pivot->group_id,$req))&&(in_array($user->id,$req)) -->