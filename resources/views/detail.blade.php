@extends('layouts.master')
@section('content')

    <h4>
    <a href="" class="text-dark text-decoration-none">
        {{ $article->title }}
    </a>
    </h4>
    <div>
    <span class="badge bg-dark mb-3">
        {{ $article->category->title ?? "Uncategory"}}
    </span>
    <span class="badge bg-dark mb-3">
        {{ $article->created_at->format('d M Y') }}
    </span>
    <span class="badge bg-dark mb-3">
        {{ $article->user->name }}
    </span>
    </div>
    <p>{{ $article->description }}</p>
    {{-- <a href="{{ route('index') }}" class="btn btn-sm btn-dark">Back</a> --}}

     @include('layouts.comment')
    @endsection