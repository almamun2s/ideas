@extends('layouts.layout')
@section('title', 'Terms')

@section('content')
    <div class="row">
        @include('shared.left_bar')
        <div class="col-6">
            <h2>Terms</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus asperiores eum ipsam maiores fugiat quam
                error
                voluptatum accusantium aspernatur numquam. Maxime eaque dolorem laboriosam architecto, maiores cumque
                sapiente
                facere! Cum.</p>
        </div>
        <div class="col-3">
            @include('shared.search_box')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
