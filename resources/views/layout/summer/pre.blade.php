{!! Form::model($pre, array('url' => route('lecturer.summer.pre', $pre->id), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
    <div class="box-body">
        @include('layout.summer.pre-form', ['SubmitButtonText' => 'Edit', 'role' => $role])
		{{ method_field('PUT') }}
    </div>
{!! Form::close() !!}