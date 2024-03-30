@extends('layouts.layout')
@section('title', 'Ideas Admin')

@section('content')
    <div class="row">
        @include('admin.shared.left_bar')
        <div class="col-9">
            @include('shared.success_message')
            <h1>Ideas</h1>

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>{{ $idea->user->name }}</td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ $idea->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('ideas.show', $idea ) }}">View</a>
                                <a href="{{ route('ideas.edit', $idea ) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
@endsection
