@extends('layouts.layout')
@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        @include('admin.shared.left_bar')
        <div class="col-9">
            @include('shared.success_message')
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col-4">
                    @include('admin.shared.widget', [
                        'title' => 'Total Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalUsers,
                    ])
                </div>
                <div class="col-4">
                    @include('admin.shared.widget', [
                        'title' => 'Total Ideas',
                        'icon' => 'fas fa-brain',
                        'data' => $totalIdeas,
                    ])
                </div>
                <div class="col-4">
                    @include('admin.shared.widget', [
                        'title' => 'Total Comments',
                        'icon' => 'fas fa-comment',
                        'data' => $totalComments,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
