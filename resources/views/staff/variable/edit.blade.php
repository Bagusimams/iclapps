@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.variable.edit', ['role' => 'staff'])
@endsection