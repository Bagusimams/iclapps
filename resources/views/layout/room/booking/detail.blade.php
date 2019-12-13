<section class="content-header">
    <h1>
      Room Booking Detail
    </h1>
    <a href="{{ url($role. '/room/booking/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
      <li><a href="{{ url($role. '/') }}">Home</a></li>
      <li><a href="{{ url($role. '/room/booking/10') }}">Room Bookings List</a></li>
    </ol>
</section>

<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          {!! Form::model($booking,array('class' => 'form-horizontal')) !!}
            <div class="box-body">
              @include('layout.room.booking.form', ['SubmitButtonText' => 'View', 'role' => $role])
            </div>
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</section>