@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.inventory.booking.edit', ['role' => 'staff'])
@endsection