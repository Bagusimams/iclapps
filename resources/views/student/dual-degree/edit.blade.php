@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.dual-degree.edit', ['role' => 'student'])
@endsection