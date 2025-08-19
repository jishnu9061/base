@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}</p>


    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
