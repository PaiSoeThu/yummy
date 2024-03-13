@extends('layouts.master')
@section('content')

    <h5>
    <a href="" class="text-dark text-decoration-none">
        {{ $article->title }}
    </a>
    </h5>
      {{-- image  --}}
      @if($article->featured_image == null)
      <img src="{{ asset("storage/download.png") }}" alt="" width="200px" height="200px" class="mb-2">
      @elseif ($article->featured_image)
      <img src="{{ asset("storage/".$article->featured_image) }}" alt="" width="200px" height="200px" class="mb-2">
      @endif
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