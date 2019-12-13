@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.room.booking.edit', ['role' => 'student'])
@endsection