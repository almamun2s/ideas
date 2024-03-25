@extends('layouts.layout')

@section('content')
    <div class="row">
        @include('shared.left_bar')
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.idea_submit')
            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea_card')
                </div>
            @endforeach
            <div class="mt-2">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_box')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
