@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.inventory.detail', ['role' => 'staff'])
@endsection