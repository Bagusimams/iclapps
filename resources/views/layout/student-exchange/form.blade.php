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
            {!! Form::label('birth_date', 'Birth Date', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('birth_date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="birth_date" value="{{ $exchange->birth_date }}" id="birth_date">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" name="birth_date" id="birth_date">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Gender', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('gender', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="gender" class="flat-red" value="Female" @if($exchange->gender == 'Female') checked @endif>
                        Female
                    </label><br>
                    <label>
                        <input type="radio" name="gender" class="flat-red" value="Male" @if($exchange->gender == 'Male') checked @endif>
                        Male
                    </label>
                @else
                    <label>
                        <input type="radio" name="gender" class="flat-red" value="Female">
                        Female
                    </label><br>
                    <label>
                        <input type="radio" name="gender" class="flat-red" value="Male">
                        Male
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', 'Phone number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('phone_number', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
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
                    {!! Form::text('email', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @else
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('address', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @else
                    {!! Form::text('address', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('whatsapp', 'Whatsapp Number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('whatsapp', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @else
                    {!! Form::text('whatsapp', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('id_number', 'ID Number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('id_number', null, array('class' => 'form-control', 'readonly' => 'readonly'))  !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('id_number', Auth::guard('student')->user()->nim, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('id_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('school_id', 'School', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('school', $exchange->school->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
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
                    {!! Form::text('major', $exchange->major->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif(Auth::guard('student')->user() != null)
                    {!! Form::text('major', Auth::guard('student')->user()->major->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    <div id="major_id">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('class', 'Class', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('class', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('class', null, array('class' => 'form-control')) !!}
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
            {!! Form::label('eng_type', 'English Certificate Type', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('eng_type', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('eng_type', getExcEng(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('eng_score', 'English Certificate Score', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('eng_score', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('eng_score', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('semester', 'Semester', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('semester', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('semester', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('batch', 'Batch', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('batch', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('batch', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('university_exchange_id', 'University Exchange', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('university_exchange', $exchange->university_exchange->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('university_exchange_id', getUniversities(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('semester_applied', 'Semester applied', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('semester_applied', $exchange->university_exchange->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('semester_applied', getSemApplied(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('father_name', 'Father name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('father_name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('father_name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('father_occupation', 'Father occupation', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('father_occupation', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('father_occupation', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('father_phone_number', 'Father phone number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('father_phone_number', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('father_phone_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('father_email', 'Father email', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('father_email', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('father_email', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('father_postal_address', 'Father postal address', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('father_postal_address', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('father_postal_address', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mother_name', 'Mother name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('mother_name', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('mother_name', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mother_occupation', 'Mother occupation', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('mother_occupation', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('mother_occupation', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mother_phone_number', 'Mother phone number', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('mother_phone_number', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('mother_phone_number', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mother_email', 'Mother email', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('mother_email', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('mother_email', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('mother_postal_address', 'Mother postal address', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('mother_postal_address', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('mother_postal_address', null, array('class' => 'form-control')) !!}
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
                    {!! Form::label('file_payment', 'Tuition Fee', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-3">
                        @if($SubmitButtonText == 'View' || ($SubmitButtonText == 'Edit' && isset($exchange->file_payment)))
                            <img class="img" src="{{ URL::to('storage/' . $exchange->file_payment) }}" alt="Gov Photo" style="background-color: white">
                        @else
                            {!! Form::file('file_payment', NULL, array('class' => 'form-control')) !!}
                        @endif
                    </div>
                </div>
            @endif

            @if($exchange->is_payment_complete == 1)
                <div class="form-group">
                    {!! Form::label('final_report', 'Final Report', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        @if($SubmitButtonText == 'View')
                            {!! Form::textArea('final_report', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::textArea('final_report', null, array('class' => 'form-control')) !!}
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
    @if(Auth::guard('student')->user())
        @if($exchange->final_report == null)
            <a href="{{ url('/' . $role . '/student-exchange/edit') }}" class="btn btn-success btn-flat btn-block form-control">Edit Student Exchange Form</a>
        @endif
    @else
        @if($exchange->final_report == null)
            <a href="{{ url('/' . $role . '/student-exchange/' . $exchange->id . '/edit') }}" class="btn btn-success btn-flat btn-block form-control">Edit Student Exchange Form</a>
        @endif
        @if($exchange->is_form_complete == 0)
            <a href="{{ url('/' . $role . '/student-exchange/' . $exchange->id . '/accept') }}" class="btn btn-info btn-flat btn-block form-control">Accept Student Exchange Form</a>
            <a href="{{ url('/' . $role . '/student-exchange/' . $exchange->id . '/reject') }}" class="btn btn-danger btn-flat btn-block form-control">Reject Student Exchange Form</a>
        @elseif($exchange->is_ticket_complete == 0 && $exchange->is_form_complete == 1)
            <a href="{{ url('/' . $role . '/student-exchange/' . $exchange->id . '/ticket') }}" class="btn btn-warning btn-flat btn-block form-control">Accept Student Exchange Ticket</a>
        @elseif($exchange->is_payment_complete == 0 && $exchange->is_form_complete == 1)
            <a href="{{ url('/' . $role . '/student-exchange/' . $exchange->id . '/payment') }}" class="btn btn-danger btn-flat btn-block form-control">Accept Student Exchange Payment</a>
        @endif
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