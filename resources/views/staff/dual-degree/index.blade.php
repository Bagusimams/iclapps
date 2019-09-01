@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.dual-degree.index', ['role' => 'staff'])
@endsection