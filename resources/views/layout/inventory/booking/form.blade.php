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
            {!! Form::label('inventory_id', 'Inventory', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('inventory', $booking->inventory->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('inventory_id', getInventoriesAvailable(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('room_id', 'Room', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText != 'Tambah')
                    {!! Form::text('room', $booking->room->name, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::select('room_id', getRooms(), null, ['class' => 'form-control select2', 'style'=>'width: 100%']) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('event', 'Event', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('event', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('event', null, array('class' => 'form-control')) !!}
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

{{ csrf_field() }}

<hr>
@if($SubmitButtonText == 'Edit')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-warning btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'Tambah')
    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-success btn-flat btn-block form-control'])  !!}
@elseif($SubmitButtonText == 'View')
    <a href="{{ url('/' . $role . '/inventory/booking/' . $booking->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Inventory Booking Detail</a>
@endif

@section('js-addon')
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection