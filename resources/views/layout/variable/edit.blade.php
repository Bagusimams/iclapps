<section class="content-header">
    <h1>
        Edit Variable</small>
    </h1>
 	<a href="{{ url($role. '/variable/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
        <li><a href="{{ url($role. '/') }}">Home</a></li>
        <li><a href="{{ url($role. '/variable/10') }}">Variable List</a></li>
        <li class="active">Edit Variable</li>
    </ol>
</section>

<section class="content">
  	<div class="row">
        <div class="col-md-12">
			<div class="box box-primary">
				{!! Form::model($variable, array('url' => route($role . '.variable.update', $variable->id), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
	                <div class="box-body">
	                    @include('layout.variable.form', ['SubmitButtonText' => 'Edit', 'role' => $role])
						{{ method_field('PUT') }}
	                </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</section>