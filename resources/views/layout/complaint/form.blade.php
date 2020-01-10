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
            {!! Form::label('identity_number', 'ID Number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('identity_number', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('identity_number', Auth::guard('student')->user()->nim, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('identity_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('school_id', 'School', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('school', $complaint->school->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('school', Auth::guard('student')->user()->school->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('school_id', getSchools(), null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'id' => 'school_id', 'onchange' => 'getMajors()']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('major_id', 'Major', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('major', $complaint->major->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('major', Auth::guard('student')->user()->major->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    <div id="major_id">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', 'Phone number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('phone_number', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
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
            {!! Form::label('complaint_type', 'Type of complaint', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('complaint_type', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('complaint_type', getComplaintType(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('date', 'Date', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" value="{{ $complaint->date }}">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date">
                    </div>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('comment', 'Describe your complaint', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-5">
                @if($SubmitButtonText == 'View')
                    {!! Form::textarea('comment', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::textarea('comment', null, array('class' => 'form-control', 'placeholder' => 'Please describe your complaint, give the location detail, date, and time')) !!}
                @endif
            </div>
        </div>

        @if(Auth::guard('student')->user() == null)
            <div class="form-group">
                {!! Form::label('reason', 'Rejected reason', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-5">
                    @if($SubmitButtonText == 'View')
                        {!! Form::textarea('reason', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::textarea('reason', null, array('class' => 'form-control')) !!}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('isDone', 'Complaint has been approved', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-3">
                    @if($SubmitButtonText == 'View')
                        @if($complaint->isDone == '1')
                            {!! Form::text('isDone', 'Done', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @elseif($complaint->isDone == '0')
                            {!! Form::text('isDone', 'Not yet', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @elseif($complaint->isDone == '2')
                            {!! Form::text('isDone', 'Rejected', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @endif
                    @elseif($SubmitButtonText == 'Edit')
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="1" @if($complaint->isDone == '1') checked @endif>
                            Done
                        </label><br>
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="0" @if($complaint->isDone == '0') checked @endif>
                            Not yet
                        </label><br>
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="0" @if($complaint->isDone == '2') checked @endif>
                            Rejected
                        </label>
                    @else
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="1">
                            Done
                        </label><br>
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="0">
                            Not yet
                        </label><br>
                        <label>
                            <input type="radio" name="isDone" class="flat-red" value="2">
                            Rejected
                        </label>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

{{ csrf_field() }}

<hr>
@if($SubmitButtonText == 'Edit')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-warning btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'Tambah')
    {!! Form::submit('Add', ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/complaint/' . $complaint->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Complaint Detail</a>
@endif

@section('javascript-addon')
    <script>
        $(function () {
            $('#tanggal_praktek').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
        });

        function getMajors()
        {
            $.ajax({
              url: "{!! url($role . '/complaint/getMajors/') !!}/" + $("#school_id").val(),
              success: function(result){
                  var htmlRes = '<select class="form-control select2" style="width: 100%" name="major_id" tabindex="-1" aria-hidden="true" required>';
                  var res = result.majors;

                  htmlRes += res + '</select>';

                  $("#major_id").html(htmlRes);
                  $('.select2').select2();
                
              },
              error: function(){
                  console.log('error');
              }
            });
        }
    </script>
@endsection