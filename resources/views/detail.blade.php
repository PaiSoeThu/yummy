@extends('layouts.master')
@section('content')

    
      {{-- image  --}}
      {{-- @if($article->featured_image == null)
      <img src="{{ asset("storage/download.png") }}" alt="" width="200px" height="200px" class="mb-2">
      @elseif ($article->featured_image)
      <img src="{{ asset("storage/".$article->featured_image) }}" alt="" width="200px" height="200px" class="mb-2">
      @endif --}}

        {{-- image  --}}
        @if($article->featured_image == null)
        <div style="background-image:url({{asset('storage//download.png')}}); background-size: cover; background-position: center top;height:450px;width:450px;"></div>
        {{-- <img src="{{ asset("storage/download.png") }}" alt="" height="250px" class="mb-2 object-fit-cover w-100"> --}}
        @elseif ($article->featured_image)
        {{-- <img src="{{ asset("storage/".$article->featured_image) }}" alt="" height="250px" class="mb-2 object-fit-cover w-100"> --}}
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
    {{-- <a href="{{ route('index') }}" class="btn btn-sm btn-primary">Back</a> --}}

     @include('layouts.comment')
    @endsection