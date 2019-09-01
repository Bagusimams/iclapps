@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.lecture-schedule.index', ['role' => 'staff'])
@endsection