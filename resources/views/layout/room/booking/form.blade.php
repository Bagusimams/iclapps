<link rel="stylesheet" href="{{asset('component/plugins/timepicker/bootstrap-timepicker.min.css')}}">

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
                @else
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
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
                        <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" value="{{ $booking->date }}" onchange="getRoomAvailableByDate()">
                    </div>
                @else
                    <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" onchange="getRoomAvailableByDate()">
                    </div>
                @endif
            </div>
        </div>

        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('start_time', 'Start Time', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-3">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('start_time', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        <div class="input-group date">
                            {!! Form::text('start_time', null, array('class' => 'form-control timepicker', 'id' => 'start_time', 'onchange' => 'getRoomAvailableByDate()')) !!}
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('end_time', 'End Time', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-3">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('end_time', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        <div class="input-group date">
                            {!! Form::text('end_time', null, array('class' => 'form-control timepicker', 'id' => 'end_time', 'onchange' => 'getRoomAvailableByDate()')) !!}
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('room_id', 'Room', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('room', $booking->room->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    <div id="room_id">
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('purpose', 'Purpose', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('purpose', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('purpose', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        @if(Auth::guard('student')->user() == null)
            <div class="form-group">
                {!! Form::label('isApproved', 'Status', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-3">
                    @if($SubmitButtonText == 'View')
                        @if($booking->isApproved == '1')
                            {!! Form::text('isApproved', 'Approved', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @elseif($booking->isApproved == '2')
                            {!! Form::text('isApproved', 'Rejected', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::text('isApproved', 'On progress', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @endif
                    @elseif($SubmitButtonText == 'Edit')
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="1" @if($booking->isApproved == '1') checked @endif>
                            Approved
                        </label><br>
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="2" @if($booking->isApproved == '2') checked @endif>
                            Rejected
                        </label><br>
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="0" @if($booking->isApproved == '0') checked @endif>
                            On progress
                        </label>
                    @else
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="1">
                            Approved
                        </label><br>
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="2">
                            Rejected
                        </label><br>
                        <label>
                            <input type="radio" name="isApproved" class="flat-red" value="0">
                            On progress
                        </label>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

@if(Auth::guard('student')->user() == null)
    {{ csrf_field() }}

    <hr>
    @if($SubmitButtonText == 'Edit')
        {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-warning btn-flat btn-block form-control'])  !!}
    @elseif($SubmitButtonText == 'Tambah')
        {!! Form::submit('Add', ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
    @elseif($SubmitButtonText == 'View')
        <a href="{{ url('/' . $role . '/room/booking/' . $booking->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Room Booking Detail</a>
    @endif
@else
    @if($SubmitButtonText == 'Tambah')
        {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
    @endif
@endif

@section('javascript-addon')
    <script src="{{asset('component/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

    <script>
        $(function () {
            $('#tanggal_praktek').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                orientation: bottom
            })
        });

        $('.timepicker').timepicker({
          showInputs: false,
          showMeridian: false
        })

        function getRoomAvailableByDate()
        {
            console.log("{!! url($role . '/course/getAvailableRoomByDate/') !!}/" + $("#start_time").val() + '/' + $("#end_time").val() + '/' + $("#tanggal_praktek").val());
            $.ajax({
              url: "{!! url($role . '/course/getAvailableRoomByDate/') !!}/" + $("#start_time").val() + '/' + $("#end_time").val() + '/' + $("#tanggal_praktek").val(),
              success: function(result){
                  var htmlRes = '<select class="form-control select2" style="width: 100%" name="room_id" tabindex="-1" aria-hidden="true" id="room_id" required>';
                  var res = result.rooms;

                  htmlRes += res + '</select>';

                  $("#room_id").html(htmlRes);
                  $('.select2').select2();
                
              },
              error: function(){
                  console.log('error');
              }
            });
        }
    </script>
@endsection