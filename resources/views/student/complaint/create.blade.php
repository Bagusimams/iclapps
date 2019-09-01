@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.complaint.create', ['role' => 'student'])
@endsection