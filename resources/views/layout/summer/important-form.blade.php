<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('full_name', 'Full Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('full_name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('full_name', Auth::guard('student')->user()->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('full_name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('passport_number', 'Passport Number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('passport_number', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('passport_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('passport_expiry_date', 'Passport Expiry Date', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('passport_expiry_date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="passport_expiry_date" value="{{ $exchange->passport_expiry_date }}" id="passport_expiry_date">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="passport_expiry_date" id="passport_expiry_date">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('gpa', 'GPA', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('gpa', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('gpa', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('toefl', 'Toefl', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('toefl', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('toefl', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('file_passport', 'Passport File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_passport)))
                    <img class="img" src="{{ URL::to('storage/' . $exchange->file_passport) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('file_passport', NULL, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('file_toefl', 'English Certificate File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_toefl)))
                    <img class="img" src="{{ URL::to('storage/' . $exchange->file_toefl) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('file_toefl', NULL, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('file_transcript', 'Transcript File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_transcript)))
                    <img class="img" src="{{ URL::to('storage/' . $exchange->file_transcript) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('file_transcript', NULL, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('file_financial', 'Financial File', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_financial)))
                    <img class="img" src="{{ URL::to('storage/' . $exchange->file_financial) }}" alt="Gov Photo" style="background-color: white">
                @else
                    {!! Form::file('file_financial', NULL, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        @if(isset($exchange))
            @if($exchange->is_form_complete == 1)
                <div class="form-group">
                    {!! Form::label('file_admission_letter', 'Admission Letter File', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_admission_letter)))
                            <img class="img" src="{{ URL::to('storage/' . $exchange->file_admission_letter) }}" alt="Gov Photo" style="background-color: white">
                        @else
                            {!! Form::file('file_admission_letter', NULL, array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('file_ticket', 'Ticket File', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_ticket)))
                            <img class="img" src="{{ URL::to('storage/' . $exchange->file_ticket) }}" alt="Gov Photo" style="background-color: white">
                        @else
                            {!! Form::file('file_ticket', NULL, array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('file_visa', 'Visa File', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_visa)))
                            <img class="img" src="{{ URL::to('storage/' . $exchange->file_visa) }}" alt="Gov Photo" style="background-color: white">
                        @else
                            {!! Form::file('file_visa', NULL, array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
            @endif

            @if($exchange->is_ticket_complete == 1)
                <div class="form-group">
                    {!! Form::label('file_payment', 'Payment File', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_payment)))
                            <img class="img" src="{{ URL::to('storage/' . $exchange->file_payment) }}" alt="Gov Photo" style="background-color: white">
                        @else
                            {!! Form::file('file_payment', NULL, array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

{{ csrf_field() }}

<hr>
@if($SubmitButtonText == 'Edit')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-warning btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'Tambah')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'View')
    @if($exchange->is_form_complete == 0)
        <a href="{{ url('/' . $role . '/summer/' . $exchange->id . '/accept') }}" class="btn btn-info btn-flat btn-block form-control">Accept Summer School Program Form</a>
        <a href="{{ url('/' . $role . '/summer/' . $exchange->id . '/reject') }}" class="btn btn-danger btn-flat btn-block form-control">Reject Summer School Program Form</a>
    @endif
@endif

@section('javascript-addon')
    <script>
        $(function () {
            $('#passport_expiry_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
            $('#birth_date').datepicker({
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