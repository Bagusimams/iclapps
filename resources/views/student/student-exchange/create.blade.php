@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.student-exchange.create', ['role' => 'student'])
@endsection