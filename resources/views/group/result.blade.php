@extends('layouts.app')


@section('content')



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Résultats des élèves <img src="/img/results.png" width="40" height="40"></h2>
			

				


				<div class="form-group ">
						<div class="col-auto">
							<label class="mr-sm-2" for="group">Group</label>
							<select class="custom-select mr-sm-2 dynamic grp" name="group" id="group" data-dependent="qcm">
								<option value="">Select Group</option>
								@foreach($groups as $group)
									<option value="{{ $group->id }}">{{ $group->titre }}</option>
        						@endforeach
      						</select>
    					</div>
    				</div>



    				<div class="form-group ">
						<div class="col-auto">
							<label class="mr-sm-2" for="qcm">QCM</label>
							<select class="custom-select mr-sm-2 dynamic"  id="qcm" data-dependent="Résultats">
									<option value="" ></option>
      						</select>
    					</div>
    				</div>

<div id="Résultats">


    				


</div>

					
		</div>
{{ csrf_field() }}
	</div>
</div>

<script type="text/javascript">


	$(document).ready(function(){
		$('.dynamic').change(function(){
			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();
				var grpid = $("#group").val();
				var dependent = $(this).data('dependent');
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{ route('GroupController.fetch') }}",
					type: 'POST',
					data:{select:select, value:value, _token:_token, dependent:dependent,grpid:grpid},
					success:function(result){
						$("#"+dependent).html(result);
					}
				})
			}
		});
	});
	
</script>


@endsection