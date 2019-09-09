@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.winter.index', ['role' => 'student'])
@endsection