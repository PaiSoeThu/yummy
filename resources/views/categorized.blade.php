@extends("layouts.master")
@section('content')

@if (request()->has("keyword") && $category->title )
<div class="d-flex justify-content-between mb-3 align-content-center">
    <p class="">Showing result is search by "{{ request()->keyword }}" and "{{$category->title}}" category</p>
    <a href="{{ route('index') }}" class="btn btn-sm btn-dark p-2 m-0">See All</a>
</div>

@elseif ($category->title)
<div class="d-flex justify-content-between mb-3 align-content-center">
    <p class="">Showing result by "{{ $category->title }}" category</p>
    <a href="{{ route('index') }}" class="btn btn-sm btn-dark p-2 m-0">See All</a>
</div>
@endif



@forelse ($articles as $article)
<div class="card mb-3">
    <div class="card-body">
        <h5>
            <a href="{{ route('detail',$article->slug) }}" class="text-dark text-decoration-none">
                {{ $article->title }}
            </a>
        </h5>
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
        <p>  {{ substr($article->description,0,100) . "..." }}</p>
        <a href="{{ route('detail',$article->slug) }}" class="btn btn-sm btn-dark">See More</a>
    </div>
</div>
    
@empty
    <div class="card">
        <div class="card-body">
            There is no records <br><br>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Try Now</a>
        </div>
    </div>
@endforelse
{{ $articles->onEachSide(1)->links() }}
@endsection