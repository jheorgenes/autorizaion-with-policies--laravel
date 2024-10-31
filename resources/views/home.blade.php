@extends('layouts.main_layout')
@section('content')

{{-- <p class="display-6 text-secondary text-center py-5">CONTENT</p> --}}
@if ($posts->count() == 0)
    <div class="my-5 opacity-50">
        No posts found.
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($posts as $post)
                    <x-post-component :post="$post" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
