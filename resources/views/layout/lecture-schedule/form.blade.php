<link rel="stylesheet" href="{{asset('component/plugins/timepicker/bootstrap-timepicker.min.css')}}">

<style type="text/css">
    .open
    {
        margin-left: 160px;
    }
</style>

<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <h3>New Schedule</h3>
            <div class="form-group">
                {!! Form::label('subject', 'Name of Subject', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('subject', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @elseif(isset($mode))
                        @if($mode == 'per' || $mode == 'temp')
                            {!! Form::text('subject', $old->subject, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::text('subject', null, array('class' => 'form-control')) !!}
                        @endif
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('code', 'Code of Subject', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('code', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @elseif(isset($mode))
                        @if($mode == 'per' || $mode == 'temp')
                            {!! Form::text('code', $old->code, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::text('code', null, array('class' => 'form-control')) !!}
                        @endif
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sks', 'SKS of Subject', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('sks', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::text('sks', null, array('class' => 'form-control', 'id' => 'sks', 'onchange' => 'changeEndTime()')) !!}
                    @endif
                </div>
            </div>
        
            <div class="form-group">
                {!! Form::label('lecturer_id', 'Lecturer', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('lecturer', $course->lecturer->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::select('lecturer_id', getLecturers(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('class', 'Class', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('class', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @elseif(isset($mode))
                        @if($mode == 'per' || $mode == 'temp')
                            {!! Form::text('class', $old->class, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::text('class', null, array('class' => 'form-control')) !!}
                        @endif
                    @endif
                </div>
            </div>
        
            @if(isset($mode))
                @if($mode == 'per' || $mode == 'new')
                    <div class="form-group">
                        {!! Form::label('day', 'Day', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            @if($SubmitButtonText == 'View')
                                {!! Form::text('day', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                            @else
                                {!! Form::select('day', getDays(), null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'id' => 'day', 'onchange' => 'getRoomAvailable()']) !!}
                            @endif
                        </div>
                    </div>
                @elseif($mode == 'temp')
                    <div class="form-group">
                        {!! Form::label('date', 'Date', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            @if($SubmitButtonText == 'View')
                                {!! Form::text('date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                            @elseif($SubmitButtonText == 'Edit')
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" value="{{ $course->date }}" onchange="getRoomAvailableByDate()">
                                </div>
                            @else
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" onchange="getRoomAvailableByDate()">
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                @if($course->mode == 'per')
                    <div class="form-group">
                        {!! Form::label('day', 'Day', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            @if($SubmitButtonText == 'View')
                                {!! Form::text('day', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                            @else
                                {!! Form::select('day', getDays(), null, ['class' => 'form-control select2', 'style'=>'width: 100%', 'id' => 'day', 'onchange' => 'getRoomAvailable()']) !!}
                            @endif
                        </div>
                    </div>
                @elseif($course->mode == 'temp')
                    <div class="form-group">
                        {!! Form::label('date', 'Date', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            @if($SubmitButtonText == 'View')
                                {!! Form::text('date', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                            @elseif($SubmitButtonText == 'Edit')
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" value="{{ $course->date }}" onchange="getRoomAvailableByDate()">
                                </div>
                            @else
                                <div class="input-group date">
                                    <input type="text" class="form-control pull-right" id="tanggal_praktek" name="date" onchange="getRoomAvailableByDate()">
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endif

            <div class="bootstrap-timepicker">
                <div class="form-group">
                    {!! Form::label('start_time', 'Start Time', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        @if($SubmitButtonText == 'View')
                            {!! Form::text('start_time', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            <div class="input-group date">
                                {!! Form::text('start_time', null, array('class' => 'form-control timepicker', 'id' => 'start_time', 'onchange' => 'changeEndTime()')) !!}
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
                    {!! Form::label('end_time', 'End Time', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        @if($SubmitButtonText == 'View')
                            {!! Form::text('end_time', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        @else
                            {!! Form::text('end_time', null, array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'end_time')) !!}
                            <!-- <div class="input-group date">
                                {!! Form::text('end_time', null, array('class' => 'form-control timepicker', 'id' => 'end_time', 'onchange' => 'getRoomAvailable()')) !!}
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                            </div> -->
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::label('room_id', 'Room', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    @if($SubmitButtonText == 'View')
                        {!! Form::text('room_id', $course->room->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        <div id="room_id">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(isset($old))
            <div class="col-sm-6">
                <h3>Old Schedule</h3>
                <div class="form-group">
                    {!! Form::label('subject_old', 'Name of Subject', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('subject_old', $old->subject, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('code_old', 'Code of Subject', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('code_old', $old->code, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('sks_old', 'SKS of Subject', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('sks_old', $old->sks, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>
            
                <div class="form-group">
                    {!! Form::label('lecturer_id_old', 'Lecturer', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('lecturer_id_old', $old->lecturer->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('class_old', 'Class', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('class_old', $old->class, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>
            
                <div class="form-group">
                    {!! Form::label('day_old', 'Day', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('day_old', $old->day, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
                </div>

                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        {!! Form::label('start_time_old', 'Start Time', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            {!! Form::text('start_time_old', $old->start_time, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        </div>
                    </div>
                </div>

                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        {!! Form::label('end_time_old', 'End Time', array('class' => 'col-sm-3 control-label')) !!}
                        <div class="col-sm-6">
                            {!! Form::text('end_time_old', $old->end_time, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('room_id_old', 'Room', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('room_id_old', $old->room->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    </div>
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
    <a href="{{ url('/' . $role . '/course/' . $course->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Lecture Schedule Detail</a>
@endif

@section('javascript-addon')
    <script src="{{asset('component/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('component/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('#tanggal_praktek').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                orientation: bottom
            })
        });

        $('.select2').select2();

        $('.timepicker').timepicker({
          showInputs: false,
          showMeridian: false
        })

        function changeEndTime()
        {
            console.log('a');
            var ori = $("#start_time").val().split(':');
            var end_time = Number(ori[0])+Number($("#sks").val());

            if(end_time < 10) end_time = '0' + end_time;
            $("#end_time").val(end_time + ':' + ori[1]);

            getRoomAvailable();

            @if(isset($mode))
                @if($mode == 'temp')
                    getRoomAvailableByDate();
                @endif
            @endif
        }

        @if(isset($course))
            function getRoomAvailable()
            {
                $.ajax({
                  url: "{!! url($role . '/course/getAvailableRoom/') !!}/" + $("#start_time").val() + '/' + $("#end_time").val() + '/' + $("#day").val(),
                  success: function(result){
                      var htmlRes = '<select class="form-control select2" style="width: 100%" name="room_id" tabindex="-1" aria-hidden="true" id="room_id" value="{{ $course->room_id }}" required>';
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
        @else
            function getRoomAvailable()
            {
                console.log("{!! url($role . '/course/getAvailableRoom/') !!}/" + $("#start_time").val() + '/' + $("#end_time").val() + '/' + $("#day").val());
                $.ajax({
                  url: "{!! url($role . '/course/getAvailableRoom/') !!}/" + $("#start_time").val() + '/' + $("#end_time").val() + '/' + $("#day").val(),
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
        @endif

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