@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.summer.edit', ['role' => 'staff'])
@endsection