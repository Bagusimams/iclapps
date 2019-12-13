@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.internship.index', ['role' => 'staff'])
@endsection