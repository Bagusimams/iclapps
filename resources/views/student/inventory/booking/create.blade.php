@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.inventory.booking.create', ['role' => 'student'])
@endsection