@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.room.create', ['role' => 'staff'])
@endsection