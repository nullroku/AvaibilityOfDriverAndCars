@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ url('/registeruser') }}" class="btn btn-primary">Register</a>
  <indexuser></indexuser>
</div>
@endsection
