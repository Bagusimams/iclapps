<section class="content-header">
    <h1>
      Dual Degree Important Info
    </h1>
    <a href="{{ url($role. '/dual-degree/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
      <li><a href="{{ url($role. '/') }}">Home</a></li>
      <li><a href="{{ url($role. '/dual-degree/10') }}">Dual Degree List</a></li>
    </ol>
</section>

<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          {!! Form::model($exchange,array('class' => 'form-horizontal')) !!}
            <div class="box-body">
              @include('layout.dual-degree.important-form', ['SubmitButtonText' => 'View', 'role' => $role])
            </div>
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</section>