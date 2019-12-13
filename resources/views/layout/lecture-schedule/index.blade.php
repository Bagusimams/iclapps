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
    @if(Request::segment(3) == 'req') Change @endif Course Schedules List
  </h1>
  <a href="{{ url($role. '/') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
  <ol class="breadcrumb">
    <li><a href="{{ url($role. '/') }}">Home</a></li>
    <li class="active">Course Schedules List</li>
  </ol>
</section>

<section class="content">             
  <div class="box">
    <div class="box-body">
      <div class="col-sm-8">
          @if(Auth::guard('staff')->user())
            <a href="{{ url('/' . $role . '/course/create/new/null') }}" class="btn btn-success col-sm-4">Add Course Schedule</a>
          @endif
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
              <th>Subject</th>
              <th>Code</th>
              <th>Lecturer</th>
              <th>Class</th>
              <th>Day/Date</th>
              <th>Time</th>
              <th>Room</th>
              <th>Mode</th>
              @if(Auth::guard('student')->user() && Request::segment(3) != 'req')
                <th colspan="2" style="text-align: center;">Change Schedule</th>
              @else
                <th>Status</th>
              @endif
              @if(Auth::guard('staff')->user())
                <th colspan="2" style="text-align: center;">Action</th>
                <th>Edit</th>
                <th>Delete</th>
              @endif
            </tr>
        </thead>
        <tbody id="table-course">
          @foreach($courses as $course)
            <tr>
              <td>{{ $course->subject }}</td>
              <td>{{ $course->code }}</td>
              <td>{{ $course->lecturer->name }}</td>
              <td>{{ $course->class }}</td>
              <td>@if($course->day != null) {{ $course->day }} @else {{ $course->date }} @endif</td>
              <td>{{ $course->start_time . ' - ' . $course->end_time }}</td>
              <td>{{ $course->room->name }}</td>
              <td>{{ $course->convertMode() }}</td>
              @if(Auth::guard('student')->user() && Request::segment(3) != 'req')
                <td><a href="{{ url('/' . $role. '/course/create/per/' . $course->id) }}">Permanent</a></td>
                <td><a href="{{ url('/' . $role. '/course/create/temp/' . $course->id) }}">Temporary</a></td>
              @else
                <td>{{ $course->convertStatus() }}</td>
              @endif
              @if(Auth::guard('staff')->user())
                <td>
                    <button type="button" class="no-btn" onclick="event.preventDefault(); document.getElementById('accept-{{$course->id}}').submit();"><i class="fa fa-check @if($course->status == 1) tosca @else gray @endif" aria-hidden="true"></i></button>

                    <form id="accept-{{$course->id}}" action="{{ url('/' . $role . '/course/' . $course->id . '/change/1') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    </form>
                </td>
                <td>
                    <button type="button" class="no-btn" onclick="event.preventDefault(); document.getElementById('decline-{{$course->id}}').submit();"><i class="fa fa-ban @if($course->status == 2) red @else gray @endif" aria-hidden="true"></i></button>

                    <form id="decline-{{$course->id}}" action="{{ url('/' . $role . '/course/' . $course->id . '/change/2') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    </form>
                </td>
                <td><a href="{{ url('/' . $role. '/course/' . $course->id . '/edit') }}"><i class="fa fa-pencil-square-o orange"></i></a></td>
                <td>
                    <button type="button" class="no-btn" data-toggle="modal" data-target="#modal-danger-{{$course->id}}"><i class="fa fa-times red" aria-hidden="true"></i></button>

                    @include('layout.deleteModal', ['id' => $course->id, 'data' => 'course', 'formName' => 'delete-form-' . $course->id])

                    <form id="delete-form-{{$course->id}}" action="{{ url('/' . $role . '/course/' . $course->id . '/delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
      @if($pagination != 'all')
        {{ $courses->render() }}
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
      window.location = window.location.origin + '/{{ $role }}/course/' + show;
    }
  </script>
@endsection 