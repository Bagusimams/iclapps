@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.inventory.booking.index', ['role' => 'student'])
@endsection