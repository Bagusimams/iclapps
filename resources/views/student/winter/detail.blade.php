@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.winter.detail', ['role' => 'student'])
@endsection