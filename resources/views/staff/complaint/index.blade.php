@extends('layout.user', ['role' => 'staff', 'title' => 'Staff'])

@section('content')
  @include('layout.complaint.index', ['role' => 'staff'])
@endsection