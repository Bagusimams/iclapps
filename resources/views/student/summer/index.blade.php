@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.summer.index', ['role' => 'student'])
@endsection