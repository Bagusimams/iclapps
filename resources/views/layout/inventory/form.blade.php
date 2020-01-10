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
            {!! Form::label('comment', 'Comment', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::textarea('comment', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::textarea('comment', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('stock', 'Stock', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    {!! Form::text('stock', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('stock', null, array('class' => 'form-control')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('showOnInvBookingMenu', 'Show on booking menu', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    @if($inventory->showOnInvBookingMenu == '1')
                        {!! Form::text('showOnInvBookingMenu', 'Show', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::text('showOnInvBookingMenu', 'Hide', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @endif
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="showOnInvBookingMenu" class="flat-red" value="1" @if($inventory->showOnInvBookingMenu == '1') checked @endif>
                        Show
                    </label><br>
                    <label>
                        <input type="radio" name="showOnInvBookingMenu" class="flat-red" value="0" @if($inventory->showOnInvBookingMenu == '0') checked @endif>
                        Hide
                    </label>
                @else
                    <label>
                        <input type="radio" name="showOnInvBookingMenu" class="flat-red" value="1">
                        Show
                    </label><br>
                    <label>
                        <input type="radio" name="showOnInvBookingMenu" class="flat-red" value="0">
                        Hide
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('isConditionGood', 'Condition', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-3">
                @if($SubmitButtonText == 'View')
                    @if($inventory->isConditionGood == '1')
                        {!! Form::text('isConditionGood', 'Good', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @else
                        {!! Form::text('isConditionGood', 'Bad', array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                    @endif
                @elseif($SubmitButtonText == 'Edit')
                    <label>
                        <input type="radio" name="isConditionGood" class="flat-red" value="1" @if($inventory->isConditionGood == '1') checked @endif>
                        Good
                    </label><br>
                    <label>
                        <input type="radio" name="isConditionGood" class="flat-red" value="0" @if($inventory->isConditionGood == '0') checked @endif>
                        Bad
                    </label>
                @else
                    <label>
                        <input type="radio" name="isConditionGood" class="flat-red" value="1">
                        Good
                    </label><br>
                    <label>
                        <input type="radio" name="isConditionGood" class="flat-red" value="0">
                        Bad
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
    <a href="{{ url('/' . $role . '/inventory/' . $inventory->id . '/edit') }}" class="btn btn-info btn-flat btn-block form-control">Edit Inventory Detail</a>
@endif

@section('js-addon')
    <script src="{{asset('component/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection