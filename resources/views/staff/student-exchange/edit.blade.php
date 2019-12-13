@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.student-exchange.edit', ['role' => 'staff'])
@endsection