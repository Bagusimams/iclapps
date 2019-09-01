@extends('layout.login')

@section('content')     
    @if($errors->any())
        <section class="bg-primary" style="padding-bottom: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="alert alert-danger content" style="font-size: 15px; margin-bottom: -50px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <body class="hold-transition bg-primary sidebar-mini">
        <div class="wrapper">
            <section class="content" style="position: relative; top: 20%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading title-content">Login Student</h2>
                            <hr class="light">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            {{ Form::open(array('route' => 'student.login')) }}   
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        {!! Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) !!}
                                    </div>                                  
                                    <div class="col-lg-12">
                                        {{ Form::text('username', null, array('class' => 'form-input', 'autocomplete' => 'off')) }}
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        {!! Form::label('password', null, array('class' => 'col-sm-2 control-label')) !!}
                                    </div>                                  
                                    <div class="col-lg-12">
                                        <input name="password" type="password" value="" id="password" class="form-input">
                                    </div>
                                </div>   
                                {{ Form::token() }}   
                                {{ Form::submit('Log in', array('class' => 'btn btn-default col-lg-2 col-lg-offset-5', 'style' => 'margin-top: 20px')) }} 
                            {{ Form::close() }}    
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>

    @include('layout.footer')
@endsection