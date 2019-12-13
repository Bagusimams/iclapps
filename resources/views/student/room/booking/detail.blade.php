@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.room.booking.detail', ['role' => 'student'])
@endsection