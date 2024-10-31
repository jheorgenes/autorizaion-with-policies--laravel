@extends('layouts.main_layout')
@section('content')

@can('create', App\Models\Post::class){{-- Para identificar qual Policies será usada, informe qual classe Model essa validação se aplica --}}
<div class="container my-3">
    <div class="row">
        <div class="col">
            <a href="{{ route('post_create') }}" class="btn btn-primary">Create post</a>
        </div>
    </div>
</div>
@endcan

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
                    @can('view', $post)
                        <x-post-component :post="$post" />
                    @endcan
                @endforeach
            </div>
        </div>
    </div>
@endsection
