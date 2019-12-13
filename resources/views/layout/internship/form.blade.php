<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('name', Auth::guard('student')->user()->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('start_date', 'Start Date', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('start_date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="start_date" name="start_date" value="{{ $internship->start_date }}">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="start_date" name="start_date">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('end_date', 'Start Date', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('end_date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="end_date" name="end_date" value="{{ $internship->end_date }}">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="end_date" name="end_date">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status Program', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    @if($internship->is_active == '1')
                        {!! Form::text('is_active', 'On Going', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @elseif($internship->is_active == '0')
                        {!! Form::text('is_active', 'Closed', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @endif
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="is_active" class="flat-red" value="1" @if($internship->is_active == '1') checked @endif>
                        On Going
                    </label><br>
                    <label>
                        <input type="radio" name="is_active" class="flat-red" value="0" @if($internship->is_active == '0') checked @endif>
                        Closed
                    </label>
                @else
                    <label>
                        <input type="radio" name="is_active" class="flat-red" value="1">
                        On Going
                    </label><br>
                    <label>
                        <input type="radio" name="is_active" class="flat-red" value="0">
                        Closed
                    </label>
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
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/internship/' . $internship->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Internship Detail</a>
@endif

@section('javascript-addon')
    <script>
        $(function () {
            $('#start_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })

            $('#end_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
        });
    </script>
@endsection