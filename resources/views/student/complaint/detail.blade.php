@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.complaint.detail', ['role' => 'student'])
@endsection