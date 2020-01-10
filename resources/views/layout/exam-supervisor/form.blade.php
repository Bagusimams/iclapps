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
            {!! Form::label('nim', 'NIM', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('nim', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('nim', Auth::guard('student')->user()->nim, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('nim', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('major_id', 'Major/Study Program', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if(Auth::guard('student')->user() != null)
                    {!! Form::text('major', Auth::guard('student')->user()->major->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'View')
                    {!! Form::text('major_id', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('major_id', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('batch_year', 'Batch Year', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('batch_year', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('batch_year', Auth::guard('student')->user()->batch_year, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('batch_year', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', 'Phone number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('phone_number', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('phone_number', Auth::guard('student')->user()->phone_number, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('phone_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('email', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('email', Auth::guard('student')->user()->email, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('english_score', 'English Score', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('english_score', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('english_score', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('type', 'English Certificate Type', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('type', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('type', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('certificate_file', 'English Certificate File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    <img class="img" src="{{ URL::to('storage/' . $supervisor->certificate_file) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('certificate_file', NULL, array('class' => 'form-control')) !!}
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
@elseif($SubmitButtonText == 'View' && Auth::guard('student')->user() != null)
    <a href="{{ url('/' . $role . '/exam-supervisor/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Proctor Detail</a>
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/exam-supervisor/' . $supervisor->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Proctor Detail</a>
@endif

@section('js-addon')
    <script src="{{asset('component/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection