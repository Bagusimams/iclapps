@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.dual-degree.detail', ['role' => 'student'])
@endsection