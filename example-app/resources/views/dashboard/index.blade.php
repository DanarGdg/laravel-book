@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @auth
  <h1 class="h2">Hi {{ auth()->user()->name }}</h1>      
  @endauth
</div>
@endsection