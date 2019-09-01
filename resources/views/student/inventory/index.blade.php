@extends('layout.user', ['role' => 'student', 'title' => 'Student'])

@section('content')
  @include('layout.inventory.index', ['role' => 'student'])
@endsection