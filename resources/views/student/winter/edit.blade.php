@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.winter.edit', ['role' => 'student'])
@endsection