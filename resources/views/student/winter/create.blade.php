@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.winter.create', ['role' => 'student'])
@endsection