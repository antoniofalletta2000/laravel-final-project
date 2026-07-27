@extends('layouts.app')
@section('content')

@if (Auth::check())
@include('dashboard')
@else
@include('auth.login')
@endif

@endsection
