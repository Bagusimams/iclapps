@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.university-joint.edit', ['role' => 'staff'])
@endsection