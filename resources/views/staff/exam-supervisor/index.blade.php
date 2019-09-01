@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.exam-supervisor.index', ['role' => 'staff'])
@endsection