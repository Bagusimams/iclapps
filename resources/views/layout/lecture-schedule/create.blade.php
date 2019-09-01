<section class="content-header">
    <h1>
        Create Course Schedule
    </h1>
 	<a href="{{ url($role. '/course/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
        <li><a href="{{ url($role. '/') }}">Home</a></li>
        <li><a href="{{ url($role. '/course/10') }}">Schedules List</a></li>
    </ol>
</section>

<section class="content">
  	<div class="row">
        <div class="col-md-12">
			<div class="box box-primary">
				@if($mode == 'new')
					{!! Form::model(old(),array('url' => route($role . '.course.store', [$mode, 'null']), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
				@else
					{!! Form::model(old(),array('url' => route($role . '.course.store', [$mode, $old->id]), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
				@endif
	                <div class="box-body">
	                    @include('layout.lecture-schedule.form', ['SubmitButtonText' => 'Tambah', 'role' => $role])
	                </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</section>