<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('isBooked', 'Status', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    @if($room->isBooked == '1')
                        {!! Form::text('isBooked', 'Booked', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::text('isBooked', 'Available', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @endif
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="isBooked" class="flat-red" value="1" @if($room->isBooked == '1') checked @endif>
                        Booked
                    </label><br>
                    <label>
                        <input type="radio" name="isBooked" class="flat-red" value="0" @if($room->isBooked == '0') checked @endif>
                        Available
                    </label>
                @else
                    <label>
                        <input type="radio" name="isBooked" class="flat-red" value="1">
                        Booked
                    </label><br>
                    <label>
                        <input type="radio" name="isBooked" class="flat-red" value="0">
                        Available
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
    {!! Form::submit('Add', ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/room/' . $room->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Room Detail</a>
@endif

@section('js-addon')
    <script src="{{asset('component/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection