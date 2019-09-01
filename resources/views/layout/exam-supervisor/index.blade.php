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
    Exam Proctors List
  </h1>
  <a href="{{ url($role. '/') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
  <ol class="breadcrumb">
    <li><a href="{{ url($role. '/') }}">Home</a></li>
    <li class="active">Exam Proctors List</li>
  </ol>
</section>

<section class="content">             
  <div class="box">
    <div class="box-body">
      <div class="col-sm-8">
          <a href="{{ url('/' . $role . '/exam-supervisor/create') }}" class="btn btn-success col-sm-4">Add Proctor</a>
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
              <th>NIM</th>
              <th>Major</th>
              <th>English Score</th>
              <th>Certificate Type</th>
              <th>Certificate</th>
              <th colspan="2" style="text-align: center;">Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table-course">
          @foreach($supervisors as $supervisor)
            <tr>
              <td>{{ $supervisor->name }}</td>
              <td>{{ $supervisor->nim }}</td>
              <td>{{ $supervisor->role()->major->name }}</td>
              <td>{{ $supervisor->english_score }}</td>
              <td>{{ $supervisor->type }}</td>
              <td><img class="img" src="{{ URL::to('storage/' . $supervisor->certificate_file) }}" alt="Gov Photo" style="background-color: white; width: 60px;"></td>
              <td>
                  <button type="button" class="no-btn" onclick="event.preventDefault(); document.getElementById('accept-{{$supervisor->id}}').submit();"><i class="fa fa-check @if($supervisor->status == 1) tosca @else gray @endif" aria-hidden="true"></i></button>

                  <form id="accept-{{$supervisor->id}}" action="{{ url('/' . $role . '/exam-supervisor/' . $supervisor->id . '/change/1') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                  </form>
              </td>
              <td>
                  <button type="button" class="no-btn" onclick="event.preventDefault(); document.getElementById('decline-{{$supervisor->id}}').submit();"><i class="fa fa-ban @if($supervisor->status == 2) red @else gray @endif" aria-hidden="true"></i></button>

                  <form id="decline-{{$supervisor->id}}" action="{{ url('/' . $role . '/exam-supervisor/' . $supervisor->id . '/change/2') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                  </form>
              </td>
              <td><a href="{{ url('/' . $role. '/exam-supervisor/' . $supervisor->id . '/edit') }}"><i class="fa fa-pencil-square-o orange"></i></a></td>
              <td>
                  <button type="button" class="no-btn" data-toggle="modal" data-target="#modal-danger-{{$supervisor->id}}"><i class="fa fa-times red" aria-hidden="true"></i></button>

                  @include('layout.deleteModal', ['id' => $supervisor->id, 'data' => 'supervisor', 'formName' => 'delete-form-' . $supervisor->id])

                  <form id="delete-form-{{$supervisor->id}}" action="{{ url('/' . $role . '/exam-supervisor/' . $supervisor->id . '/delete') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                  </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @if($pagination != 'all')
        {{ $supervisors->render() }}
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
              url: "{!! url($role . '/exam-supervisor/') !!}/" + $("#search-input").val(),
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
      window.location = window.location.origin + '/{{ $role }}/inventory/' + show;
    }
  </script>
@endsection 