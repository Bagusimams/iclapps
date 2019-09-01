@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.student-exchange.assign', ['role' => 'staff'])
@endsection