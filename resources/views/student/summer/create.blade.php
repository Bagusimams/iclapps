@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.summer.create', ['role' => 'student'])
@endsection