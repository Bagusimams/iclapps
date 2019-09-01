@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.room.booking.detail', ['role' => 'staff'])
@endsection