@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.winter-school.edit', ['role' => 'staff'])
@endsection