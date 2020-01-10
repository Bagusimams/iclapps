<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('display_name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                {!! Form::text('display_name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('score', 'Score', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('score', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @else
                    {!! Form::text('score', null, array('class' => 'form-control')) !!}
                @endif
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
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/variable/' . $variable->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Variable Detail</a>
@endif