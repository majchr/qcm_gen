@extends('layouts.app')




@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="display: flex;">
			<div class="col-md-6" >
<form method="POST" action="{{ url('groups/inscription') }}">
                        @csrf
			<div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Registration code</label>

                            <div class="col-md-6">
                                <input id="code" type="password"  name="code"  autofocus>

                               @if($errors->get('code'))
                        @foreach($errors->get('code') as $message)
                            <span style="color: red"><li>{{ $message }}</li></span>
                        @endforeach
                    @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Inscrivez
                                </button>
                            </div>
                        </div>
                    </form>



</div>
<div class="col-md-6">
	@foreach($groups as $group)

<div class="card text-white bg-info mb-3 " style="max-width: 18rem;">
  <div class="card-header">{{$group->titre}}</div>
  <div class="card-body">
    <h5 class="card-title">Professeur: Monsieur<h4>{{$group->user->name}}</h4></h5>
    	
    <p class="card-text">@if($group->pivot->allow)<img src="/img/ok1.png" width="30" height="30">Valider @else <img src="/img/attente.png" width="30" height="30">En Attente @endif</p>
    
  </div>
</div>
@endforeach
</div>
</div></div></div>




@endsection