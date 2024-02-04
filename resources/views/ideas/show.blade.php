@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidbar')
        </div>
        <div class="col-6">
            {{-- flash message --}}
            @include('shared.success-message')
            <hr>
            <div class="mt-3">
                @include('shared.idea-card') 
            </div>


        </div>
        <div class="col-3">
            @include('layout.search-bar')
            @include('layout.follow-box')
        </div>
    </div>
@endsection
