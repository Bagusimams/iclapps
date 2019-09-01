<section class="content-header">
    <h1>
        Edit Exam Proctor {{ $supervisor->name }}</small>
    </h1>
 	<a href="{{ url($role. '/exam-supervisor/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
        <li><a href="{{ url($role. '/') }}">Home</a></li>
        <li><a href="{{ url($role. '/exam-supervisor/10') }}">Supervisors List</a></li>
        <li class="active">Edit Exam Proctor</li>
    </ol>
</section>

<section class="content">
  	<div class="row">
        <div class="col-md-12">
			<div class="box box-primary">
				{!! Form::model($supervisor, array('url' => route($role . '.exam-supervisor.update', $supervisor->id), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
	                <div class="box-body">
	                    @include('layout.exam-supervisor.form', ['SubmitButtonText' => 'Edit', 'role' => $role])
						{{ method_field('PUT') }}
	                </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</section>