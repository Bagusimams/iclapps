@extends('layout.user', ['role' => 'lecturer', 'title' => 'Lecturer'])

@section('content')
  @include('layout.dual-degree.index', ['role' => 'lecturer'])
@endsection