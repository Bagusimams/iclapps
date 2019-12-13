@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.room.booking.index', ['role' => 'student'])
@endsection