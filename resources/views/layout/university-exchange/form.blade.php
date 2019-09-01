<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-8">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    @if($university->status == '1')
                        {!! Form::text('status', 'On', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::text('status', 'Off', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @endif
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="status" class="flat-red" value="1" @if($university->status == '1') checked @endif>
                        On
                    </label><br>
                    <label>
                        <input type="radio" name="status" class="flat-red" value="0" @if($university->status == '0') checked @endif>
                        Off
                    </label>
                @else
                    <label>
                        <input type="radio" name="status" class="flat-red" value="1">
                        On
                    </label><br>
                    <label>
                        <input type="radio" name="status" class="flat-red" value="0">
                        Off
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('start', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="start" value="{{ $university->start }}" id="start">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="start" id="start">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('end', 'End', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('end', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="end" value="{{ $university->end }}" id="end">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="end" id="end">
                    </div>
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
    <a href="{{ url('/' . $role . '/university-exchange/' . $university->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit University Exchange Detail</a>
@endif

@section('javascript-addon')
    <script src="{{asset('component/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();

            $('#start').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
            $('#end').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
        });
    </script>
@endsection