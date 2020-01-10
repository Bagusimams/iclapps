<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('lecturer_id', 'University Joint', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                {!! Form::select('lecturer_id', getLecturers(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
            </div>
        </div>
    </div>
</div>

{{ csrf_field() }}

<hr>
@if($SubmitButtonText == 'Edit')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-warning btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'Tambah')
    {!! Form::submit('Add', ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@endif

@section('javascript-addon')
@endsection