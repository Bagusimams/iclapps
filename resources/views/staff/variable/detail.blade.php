@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.variable.detail', ['role' => 'staff'])
@endsection