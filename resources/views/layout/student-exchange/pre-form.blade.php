<div class="panel-body">
    <div class="row">
        <div class="form-group">
            {!! Form::label('pic', 'PIC at Partner University/Contact Number', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('pic', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('pic', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('ensure', 'Ensure all the students are ready to depart (preparation to airport check- in)', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('ensure', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="ensure" class="flat-red" value=1 @if($pre->ensure == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="ensure" class="flat-red" value=0 @if($pre->ensure == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="ensure" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="ensure" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('confirm', 'Confirm and observe the students’ accommodation including the living environment', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('confirm', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="confirm" class="flat-red" value=1 @if($pre->confirm == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="confirm" class="flat-red" value=0 @if($pre->confirm == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="confirm" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="confirm" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('escort', 'Escort and delegate the students to the partner universities', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('escort', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="escort" class="flat-red" value=1 @if($pre->escort == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="escort" class="flat-red" value=0 @if($pre->escort == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="escort" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="escort" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('reintroduce', 'Reintroduce and promote international programs held by Telkom University', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('reintroduce', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="reintroduce" class="flat-red" value=1 @if($pre->reintroduce == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="reintroduce" class="flat-red" value=0 @if($pre->reintroduce == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="reintroduce" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="reintroduce" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('meet', 'Meet and Cooperate with the PIC of exchange program at partner universities', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('meet', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="meet" class="flat-red" value=1 @if($pre->meet == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="meet" class="flat-red" value=0 @if($pre->meet == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="meet" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="meet" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('make', 'Make sure all the students follow the exchange program orientation', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('make', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="make" class="flat-red" value=1 @if($pre->make == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="make" class="flat-red" value=0 @if($pre->make == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="make" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="make" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('monitor', 'Monitor the students’ learning progress (monthly) and inform it to ICAO', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('monitor', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="monitor" class="flat-red" value=1 @if($pre->monitor == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="monitor" class="flat-red" value=0 @if($pre->monitor == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="monitor" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="monitor" class="flat-red" value=0>
                        Not yet
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('remind', 'Remind the students to make the exchange program report and poster', array('class' => 'col-sm-5 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('remind', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="remind" class="flat-red" value=1 @if($pre->remind == 1) checked @endif>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="remind" class="flat-red" value=0 @if($pre->remind == 0) checked @endif>
                        Not yet
                    </label>
                @else
                    <label>
                        <input type="radio" name="remind" class="flat-red" value=1>
                        Yes
                    </label><br>
                    <label>
                        <input type="radio" name="remind" class="flat-red" value=0>
                        Not yet
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