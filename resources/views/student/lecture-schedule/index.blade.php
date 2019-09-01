@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.lecture-schedule.index', ['role' => 'student'])
@endsection