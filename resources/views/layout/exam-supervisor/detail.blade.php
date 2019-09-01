<section class="content-header">
    <h1>
      Exam Proctor Detail
    </h1>
    @if(Auth::guard('student')->user() == null)
      <a href="{{ url($role. '/exam-supervisor/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
      <ol class="breadcrumb">
        <li><a href="{{ url($role. '/') }}">Home</a></li>
        <li><a href="{{ url($role. '/exam-supervisor/10') }}">Supervisors List</a></li>
      </ol>
    @endif
</section>

<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <h3>Status : {{ $supervisor->convertStatus() }}</h3>
          {!! Form::model($supervisor,array('class' => 'form-horizontal')) !!}
            <div class="box-body">
              @include('layout.exam-supervisor.form', ['SubmitButtonText' => 'View', 'role' => $role])
            </div>
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</section>