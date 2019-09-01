@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.complaint.edit', ['role' => 'staff'])
@endsection