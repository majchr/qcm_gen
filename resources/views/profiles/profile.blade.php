@extends('layouts.app')




@section('content')

<div class="container">
	<div class="col-lg-4">
		<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
			<div class="card-header text-center">{{$user->name}}'s profile</div>
			<div class="card-body text-center">
				<img src="/storage/avatars/{{ $user->avatar }}" width="100px" height="100px" class="rounded-circle  justify-content-end" ><h1 class="text-hide">Custom heading</h1></img>

				<form action="{{ url('profile/update/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
    <br>
    <input type="file" name="avatar" id="avatar" accept="image/*">
    <input type="submit" value="Upload Image" class="btn btn-success" name="submit">
</form>
			</div>
		</div>
	</div>
</div>


@endsection