@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.lecture-schedule.detail', ['role' => 'staff'])
@endsection