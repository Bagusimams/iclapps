@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.room.index', ['role' => 'student'])
@endsection