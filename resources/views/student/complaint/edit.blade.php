@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.complaint.edit', ['role' => 'student'])
@endsection