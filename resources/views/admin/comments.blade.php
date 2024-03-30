@extends('layouts.layout')
@section('title', 'Comments Admin')

@section('content')
    <div class="row">
        @include('admin.shared.left_bar')
        <div class="col-9">
            @include('shared.success_message')
            <h1>Comments</h1>

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Idea</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('profile.show', $comment->user) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.show', $comment->idea) }}">
                                    {{ Str::limit($comment->idea->content, 15, '...') }}
                                </a>
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    {{-- <button type="submit" class="form-control text-dark">Delete</button> --}}
                                    <a href="#" onclick="this.closest('form').submit();return false;">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
