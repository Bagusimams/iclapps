@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.winter.important', ['role' => 'staff'])
@endsection