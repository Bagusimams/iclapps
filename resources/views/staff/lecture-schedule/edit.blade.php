@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.lecture-schedule.edit', ['role' => 'staff'])
@endsection