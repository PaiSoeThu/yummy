@extends("layouts.master")
@section('content')


@if (request()->has("keyword"))
<div class="d-flex justify-content-between mb-3 align-content-center">
    <p class="">Showing result by "{{ request()->keyword }}"</p>
    <a href="{{ route('index') }}" class="btn btn-sm btn-dark p-2 m-0">See All</a>
</div>
@endif

<div class="row">
@forelse ($articles as $article)
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-body">
                {{-- title  --}}
                <h5>
                    <a href="{{ route('detail',$article->slug) }}" class="text-dark text-decoration-none">
                        {{ substr($article->title,0,20) . "..." }}
                    </a>
                </h5>
                {{-- image  --}}
                @if($article->featured_image == null)
                <img src="{{ asset("storage/download.png") }}" alt="" width="100px" height="100px" class="mb-2">
                @elseif ($article->featured_image)
                <img src="{{ asset("storage/".$article->featured_image) }}" alt="" width="100px" height="100px" class="mb-2">
                @endif
                {{-- info  --}}
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
                {{-- description  --}}
                <p>  {{ substr($article->description,0,100) . "..." }}</p>
                {{-- button  --}}
                <a href="{{ route('detail',$article->slug) }}" class="btn btn-sm btn-dark">See More</a>
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