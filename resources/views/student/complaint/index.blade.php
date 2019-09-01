@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.complaint.index', ['role' => 'student'])
@endsection