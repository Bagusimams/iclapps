@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.university-exchange.index', ['role' => 'staff'])
@endsection