@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.inventory.booking.edit', ['role' => 'student'])
@endsection