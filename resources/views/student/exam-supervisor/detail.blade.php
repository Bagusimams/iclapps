@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.exam-supervisor.detail', ['role' => 'student'])
@endsection