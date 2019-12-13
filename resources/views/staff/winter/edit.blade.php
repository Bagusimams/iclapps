@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.winter.edit', ['role' => 'staff'])
@endsection