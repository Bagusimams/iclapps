@extends('layout.user', ['role' => 'lecturer', 'title' => 'Lecturer'])

@section('content')
  @include('layout.summer.index', ['role' => 'lecturer'])
@endsection