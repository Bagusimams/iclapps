@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.exam-supervisor.edit', ['role' => 'staff'])
@endsection