@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.summer.detail', ['role' => 'student'])
@endsection