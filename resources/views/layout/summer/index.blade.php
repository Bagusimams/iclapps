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
    Summer School Program List
  </h1>
  <a href="{{ url($role. '/') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
  <ol class="breadcrumb">
    <li><a href="{{ url($role. '/') }}">Home</a></li>
    <li class="active">Summer School Program List</li>
  </ol>
</section>

<section class="content">             
  <div class="box">
    <div class="box-body">
      <div class="col-sm-8">
          {!! Form::label('university_id', 'University', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-5">
            {!! Form::select('university_id', getSummerSchools(), $university_id, ['class' => 'form-control', 'style'=>'width: 100%', 'id' => 'university_id', 'onchange' => 'advanceSearch()']) !!}
          </div>
          {!! Form::label('show', 'Show', array('class' => 'col-sm-1 control-label')) !!}
          <div class="col-sm-2">
            {!! Form::select('show', getPagination(), $pagination, ['class' => 'form-control', 'style'=>'width: 100%', 'id' => 'show', 'onchange' => 'advanceSearch()']) !!}
          </div>
          @if($role == 'staff')
            <a href="{{ url($role. '/summer/' . $university_id . '/upload') }}" class="btn btn-success">Upload</a>
          @endif
      </div>
      <div class="col-sm-4">
        <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
      </div>
      @if(Auth::guard('lecturer')->user() && isset($pre))
        <div class="col-sm-8">
          @include('layout.summer.pre')
        </div>
      @endif
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Student ID</th>
              <th>Full Name</th>
              <th>School</th>
              <th>Major</th>
              <th>University</th>
              @if(Auth::guard('staff')->user())
                <th>Important Info</th>
                <th>Assign</th>
                <th>Detail</th>
                <th>Delete</th>
              @elseif(Auth::guard('lecturer')->user())
                <th>Second Week</th>
                <th>Mid</th>
                <th>Final</th>
              @endif
            </tr>
        </thead>
        <tbody id="table-course">
          @foreach($exchanges as $exchange)
            <tr>
              <td>{{ $exchange->student_id }}</td>
              <td>{{ $exchange->full_name }}</td>
              <td>{{ $exchange->school->name }}</td>
              <td>{{ $exchange->major->name }}</td>
              <td>{{ $exchange->summer_school->name }}</td>
              @if(Auth::guard('staff')->user())
                <td><a href="{{ url('/' . $role. '/summer/' . $exchange->id . '/important') }}"><i class="fa fa-hand-o-right orange"></i></a></td>
                <td><a href="{{ url('/' . $role. '/summer/' . $exchange->id . '/assign') }}"><i class="fa fa-hand-o-right pink"></i></a></td>
                <td><a href="{{ url('/' . $role. '/summer/' . $exchange->id . '/detail') }}"><i class="fa fa-hand-o-right tosca"></i></a></td>
                <td>
                    <button type="button" class="no-btn" data-toggle="modal" data-target="#modal-danger-{{$exchange->id}}"><i class="fa fa-times red" aria-hidden="true"></i></button>

                    @include('layout.deleteModal', ['id' => $exchange->id, 'data' => 'Summer School Program', 'formName' => 'delete-form-' . $exchange->id])

                    <form id="delete-form-{{$exchange->id}}" action="{{ url('/' . $role . '/summer/' . $exchange->id . '/delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
              @elseif(Auth::guard('lecturer')->user())
                <td>
                  <form action="{{ url('/' . $role . '/summer/' . $exchange->id . '/report') }}" method="POST">
                    {!! Form::textArea('lecturer_second_week_report', null, array('class' => 'form-control')) !!}<br>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-flat btn-block form-control'])  !!}
                  </form>
                </td>
                <td>
                  <form action="{{ url('/' . $role . '/summer/' . $exchange->id . '/report') }}" method="POST">
                    {!! Form::textArea('lecturer_mid_report', null, array('class' => 'form-control')) !!}<br>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-flat btn-block form-control'])  !!}
                  </form>
                </td>
                <td>
                  <form action="{{ url('/' . $role . '/summer/' . $exchange->id . '/report') }}" method="POST">
                    {!! Form::textArea('lecturer_final_report', null, array('class' => 'form-control')) !!}<br>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-flat btn-block form-control'])  !!}
                  </form>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
      @if($pagination != 'all')
        {{ $exchanges->render() }}
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
      var show          = $('#show').val();   
      var university_id = $('#university_id').val();   
      window.location   = window.location.origin + '/{{ $role }}/summer/' + university_id + '/{{ $status }}/' + show;
    }
  </script>
@endsection 