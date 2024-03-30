@extends('layouts.layout')
@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        @include('admin.shared.left_bar')
        <div class="col-9">
            @include('shared.success_message')
            <h1>Admin Dashboard</h1>
        </div>
    </div>
@endsection
