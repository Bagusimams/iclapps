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
        <div class="box box-primary" style="height: 100px;">
          <h3><center>Sorrry, You are not eligable</h3>
        </div>
      </div>
  </div>
</section>