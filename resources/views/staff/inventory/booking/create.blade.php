@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.inventory.booking.create', ['role' => 'staff'])
@endsection