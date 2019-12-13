@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.internship.edit', ['role' => 'staff'])
@endsection