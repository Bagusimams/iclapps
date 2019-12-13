<section class="content-header">
    <h1>
      Internship Program Detail
    </h1>
    <a href="{{ url($role. '/internship/10') }}" class="no-link"><i class="fa fa-arrow-circle-o-left tosca"></i> Back</a>
    <ol class="breadcrumb">
      <li><a href="{{ url($role. '/') }}">Home</a></li>
      <li><a href="{{ url($role. '/internship/10') }}">Internship Programs List</a></li>
    </ol>
</section>

<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          {!! Form::model($internship,array('class' => 'form-horizontal')) !!}
            <div class="box-body">
              @include('layout.internship.form', ['SubmitButtonText' => 'View', 'role' => $role])
            </div>
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</section>