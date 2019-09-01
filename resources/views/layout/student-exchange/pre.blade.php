
{!! Form::model($pre, array('url' => route('lecturer.student-exchange.pre', $pre->id), 'enctype'=>'multipart/form-data', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
    <div class="box-body">
        @include('layout.student-exchange.pre-form', ['SubmitButtonText' => 'Edit', 'role' => $role])
		{{ method_field('PUT') }}
    </div>
{!! Form::close() !!}