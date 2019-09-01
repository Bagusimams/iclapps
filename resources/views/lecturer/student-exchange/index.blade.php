@extends('layout.user', ['role' => 'lecturer', 'title' => 'Lecturer'])

@section('content')
  @include('layout.student-exchange.index', ['role' => 'lecturer'])
@endsection