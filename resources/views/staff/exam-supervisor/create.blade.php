@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.exam-supervisor.create', ['role' => 'staff'])
@endsection