@if($type != null)
	@if($type == 'pass')
	  	<div class="alert alert-{{ $color }} alert-dismissible" id="message">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Your passport doesn’t meet the requirement. It must be valid at least seven months after the final day of travel</h4>
	  	</div>
	@elseif($type == 'gpa')
	  	<div class="alert alert-{{ $color }} alert-dismissible" id="message">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Your gpa is not qualified for applying this program</h4>
	  	</div>
	@elseif($type == 'toefl')
	  	<div class="alert alert-{{ $color }} alert-dismissible" id="message">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Your toefl score is not qualified for applying this program</h4>
	  	</div>
	@else
	  	<div class="alert alert-{{ $color }} alert-dismissible" id="message">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> {{ $data }} has been {{ $type }}</h4>
	  	</div>
	@endif
@endif