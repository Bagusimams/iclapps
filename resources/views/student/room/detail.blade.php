@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.room.detail', ['role' => 'student'])
@endsection