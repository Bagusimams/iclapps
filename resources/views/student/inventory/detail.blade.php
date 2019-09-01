@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.inventory.detail', ['role' => 'student'])
@endsection