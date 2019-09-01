<style type="text/css">
  .orange
  {
    color: orange;
  }

  .red
  {
    color: red;
  }

  .no-btn
  {
      border: 0;
      background-color: transparent;
      color: #39CCCC;
  }
</style>

<section class="content-header">
  <h1>
    Inventory Bookings List
  </h1>
  <a href="{{ url($role. '/') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
  <ol class="breadcrumb">
    <li><a href="{{ url($role. '/') }}">Home</a></li>
    <li class="active">Inventory Bookings List</li>
  </ol>
</section>

<section class="content">             
  <div class="box">
    <div class="box-body">
      <div class="col-sm-8">
          <a href="{{ url('/' . $role . '/inventory/booking/create') }}" class="btn btn-success col-sm-4">Add Inventory Booking</a>
          {!! Form::label('show', 'Show', array('class' => 'col-sm-1 control-label')) !!}
          <div class="col-sm-2">
            {!! Form::select('show', getPagination(), $pagination, ['class' => 'form-control', 'style'=>'width: 100%', 'id' => 'show', 'onchange' => 'advanceSearch()']) !!}
          </div>
      </div>
      <div class="col-sm-4">
        <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
      </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Name</th>
              <th>Inventory</th>
              <th>Room</th>
              <th>Event</th>
              <th>Status</th>
              <th>Detail</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table-course">
          @foreach($bookings as $booking)
            <tr>
              <td>{{ $booking->name }}</td>
              <td>{{ $booking->inventory->name }}</td>
              <td>{{ $booking->room->name }}</td>
              <td>{{ $booking->event }}</td>
              <td @if($booking->isApproved == '2')class="back-red"@endif>{{ $booking->isApproved() }}</td>
              <td><a href="{{ url('/' . $role. '/inventory/booking/' . $booking->id . '/detail') }}"><i class="fa fa-hand-o-right tosca"></i></a></td>
              <td><a href="{{ url('/' . $role. '/inventory/booking/' . $booking->id . '/edit') }}"><i class="fa fa-pencil-square-o orange"></i></a></td>
              <td>
                  <button type="button" class="no-btn" data-toggle="modal" data-target="#modal-danger-{{$booking->id}}"><i class="fa fa-times red" aria-hidden="true"></i></button>

                  @include('layout.deleteModal', ['id' => $booking->id, 'data' => 'inventory booking', 'formName' => 'delete-form-' . $booking->id])

                  <form id="delete-form-{{$booking->id}}" action="{{ url('/' . $role . '/inventory/booking/' . $booking->id . '/delete') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                  </form></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @if($pagination != 'all')
        {{ $bookings->render() }}
      @endif
    </div>
  </div>
</section>

@section('javascript-addon') 
  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(fade_out, 5000);

      function fade_out() {
        $("#message").fadeOut().empty();
      }
    });

    $(document).ready(function(){
        $("#search-input").keyup( function(e){
          if(e.keyCode == 13)
          {
            $.ajax({
              url: "{!! url($role . '/inventory/') !!}/" + $("#search-input").val(),
              success: function(result){
                var htmlResult = "";
                console.log(result);
                var r = result.inventories;
                for (var i = 0; i < r.length; i++) {
                  htmlResult += "<tr><td>" + r[i].name + "</td><td>" + r[i].name + "</td><td>" + r[i].role + "</td><td><a href=\"" + window.location.origin + "/" + '{{ $role }}' + "/lecturers/" + r[i].id + "/edit\"><i class=\"fa fa-pencil-square-o orange\"></i></a></td><td><a href=\"" + window.location.origin + "/" + '{{ $role }}' + "/lecturers/" + r[i].id + "/delete\" onclick=\"event.preventDefault(); document.getElementById('delete-form-" + r[i].id + "').submit();\"><i class=\"fa fa-times red\"></i></a><form id='delete-form-" + r[i].id + "' action=\"" + window.location.origin + "/" + '{{ $role }}' + "/lecturers/" + r[i].id + "/delete\" method=\"POST\" style=\"display: none;\">" + '{{ csrf_field() }}' + '{{ method_field("DELETE") }}' + "</form></td></tr>";
                }

                $("#table-course").html(htmlResult);
              },
              error: function(){
                  console.log('error');
              }
              });
          }
        });
    });

    function advanceSearch()
    {
      var show       = $('#show').val();   
      window.location = window.location.origin + '/{{ $role }}/inventory/booking/' + show;
    }
  </script>
@endsection 