<section class="content-header">
    <h1>
        Upload Summer School Program SK</small>
    </h1>
 	<a href="{{ url($role. '/summer/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
        <li><a href="{{ url($role. '/') }}">Home</a></li>
        <li><a href="{{ url($role. '/summer/10') }}">Summer School ProgramList</a></li>
        <li class="active">Upload Summer School Program SK</li>
    </ol>
</section>

<section class="content">
  	<div class="row">
        <div class="col-md-12">
			<div class="box box-primary">
				{!! Form::model($exchanges, array('url' => route($role . '.summer.upload', $university_id), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
	                <div class="box-body">
	                    @include('layout.summer.upload-form', ['SubmitButtonText' => 'Edit', 'role' => $role])
						{{ method_field('PUT') }}
	                </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</section>