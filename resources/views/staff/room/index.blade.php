@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.room.index', ['role' => 'staff'])
@endsection