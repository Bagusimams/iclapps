@extends('layout.user', ['role' => 'lecturer', 'title' => 'Lecturer'])

@section('content')
  @include('layout.winter.index', ['role' => 'lecturer'])
@endsection