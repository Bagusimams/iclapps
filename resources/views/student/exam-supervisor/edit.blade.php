@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.exam-supervisor.edit', ['role' => 'student'])
@endsection