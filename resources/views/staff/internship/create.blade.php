@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.internship.create', ['role' => 'staff'])
@endsection