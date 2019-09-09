@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.winter-school.detail', ['role' => 'staff'])
@endsection