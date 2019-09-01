@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.dual-degree.index', ['role' => 'student'])
@endsection