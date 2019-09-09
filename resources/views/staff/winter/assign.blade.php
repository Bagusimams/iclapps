@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.winter.assign', ['role' => 'staff'])
@endsection