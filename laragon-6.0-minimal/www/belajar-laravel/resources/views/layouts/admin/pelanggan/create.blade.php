@extends('layouts.admin.app')

@section('content')
        {{-- start main content --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
       @endif

       <div class="card border-0 shadow mb-4"></div>
       {{-- end main content --}}
@endsection
