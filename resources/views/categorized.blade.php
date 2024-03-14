@extends("layouts.master")
@section('content')

@if (request()->has("keyword") && $category->title )
<div class="d-flex justify-content-between mb-3 align-content-center">
    <p class="">Showing result is search by "{{ request()->keyword }}" and "{{$category->title}}" category</p>
    <a href="{{ route('index') }}" class="btn btn-sm btn-primary p-2 m-0">See All</a>
</div>

@elseif ($category->title)
<div class="d-flex justify-content-between mb-3 align-content-center">
    <p class="">Showing result by "{{ $category->title }}" category</p>
    <a href="{{ route('index') }}" class="btn btn-sm btn-primary p-2 m-0">See All</a>
</div>
@endif


<div class="row">
@forelse ($articles as $article)
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="card-body bg-body-tertiary">

              {{-- image  --}}
              @if($article->featured_image == null)
              <div style="background-image:url({{asset('storage//download.png')}}); background-size: cover; background-position: center top;height:250px;"></div>
              @elseif ($article->featured_image)
              <div style="background-image:url({{asset('storage/'.$article->featured_image)}}); background-size: cover; background-position: center top;height:250px;"></div>
              @endif
        {{-- title  --}}
        <h5 class="mt-3">
            <a href="{{ route('detail',$article->slug) }}" class="text-dark-emphasis text-decoration-none">
                {{ substr($article->title,0,20) . "..." }}
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
        <p class="text-light-50">  {{ substr($article->description,0,80) . "..." }}</p>
        <a href="{{ route('detail',$article->slug) }}" class="btn btn-sm btn-primary">See More</a>
    </div>
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
</div>
{{ $articles->onEachSide(1)->links() }}
@endsection