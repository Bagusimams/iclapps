@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.university-joint.detail', ['role' => 'staff'])
@endsection