@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.room.booking.edit', ['role' => 'staff'])
@endsection