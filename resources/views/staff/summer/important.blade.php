@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.summer.important', ['role' => 'staff'])
@endsection