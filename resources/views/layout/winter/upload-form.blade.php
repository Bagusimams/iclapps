<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('student', 'Student Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-8">
                @if($SubmitButtonText == 'View')
                @elseif($SubmitButtonText == 'Edit')
                    @foreach($exchanges as $exchange)
                        @if($exchange != null) <input type="checkbox" name="students[]" value="$exchange[0]->student->id"> {{ $exchange[0]->student->name . ' (' . $exchange[0]->university_joint->name . ')' }}<br> @endif
                    @endforeach
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
            {!! Form::label('file_sk', 'SK File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_sk)))
                    <img class="img" src="{{ URL::to('storage/' . $exchange->file_sk) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('file_sk', NULL, array('class' => 'form-control')) !!}
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
    <a href="{{ url('/' . $role . '/winter-school/' . $university->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Winter School Detail</a>
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