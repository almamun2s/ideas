@extends('layouts.layout')

@section('content')
    <div class="row">
        @include('shared.left_bar')
        <div class="col-6">
            <div class="mt-3">
                @include('profile.profile')
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_box')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
