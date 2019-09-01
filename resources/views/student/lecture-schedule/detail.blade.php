@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.lecture-schedule.detail', ['role' => 'student'])
@endsection