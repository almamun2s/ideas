@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        @include('shared.left_bar')
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.idea_submit')
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea_card')
                    </div>
                @endforeach

                <div class="mt-2">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            @else
                <p class="text-center"> {{ __('ideas.idea_not_found')}} </p>
            @endif
        </div>
        <div class="col-3">
            @include('shared.search_box')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
