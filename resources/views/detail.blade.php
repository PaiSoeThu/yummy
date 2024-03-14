@extends('layouts.master')
@section('content')

        {{-- image  --}}
        @if($article->featured_image == null)
        <div style="background-image:url({{asset('storage//download.png')}}); background-size: cover; background-position: center top;height:450px;width:450px;"></div>
        @elseif ($article->featured_image)
        <div style="background-image:url({{asset('storage/'.$article->featured_image)}}); background-size: cover; background-position: center top;height:450px;width:450px;"></div>
        @endif
      <h5 class="mt-3">
        <a href="" class="text-primary text-decoration-none">
            {{ $article->title }}
        </a>
        </h5>
    <div>
    <span class="badge bg-primary mb-3">
        {{ $article->category->title ?? "Uncategory"}}
    </span>
    <span class="badge bg-primary mb-3">
        {{ $article->created_at->format('d M Y') }}
    </span>
    <span class="badge bg-primary mb-3">
        {{ $article->user->name }}
    </span>
    </div>
    <p>{{ $article->description }}</p>

     @include('layouts.comment')
    @endsection