@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.variable.index', ['role' => 'staff'])
@endsection