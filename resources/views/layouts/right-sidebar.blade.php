<div class="position-sticky" style="top:80px">
    {{-- search --}}
    <div class="mb-2">
        <form action="" method="">
        <div class="input-group">
            <input type="text" 
            class="form-control" 
            name="keyword"
          
            value="{{ request()->keyword }}"           
            >
            @if (request()->has('keyword'))
            <a href="{{ route("index") }}" class="btn btn-sm pt-2 btn-outline-secondary" ><i class="bi bi-backspace"></i></a>
            @endif
            <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
        {{-- category --}}
    <div class="mb-2">
        <p class="fw-bold mb-2 text-dark-emphasis">Categories</p>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('index') }}">
            All Categories
            </a>
            @foreach (App\Models\Category::all() as $category )
            <a href="{{ route('categorized',$category->slug) }}" class="list-group-item list-group-item-action text-light-50">{{$category->title}}</a>
            @endforeach
        </div>
    </div>

    {{-- article --}}
    <div class="mb-2">
        <p class="fw-bold mb-2 text-dark-emphasis">Latest Posts</p>
        <div class="list-group">
            @foreach (App\Models\Article::latest('id')->limit(5)->get() as $article )
            <a href="{{ route('detail',$article->slug) }}" class="list-group-item list-group-item-action text-light-50">{{$article->title}}</a>
            @endforeach
        </div>
    </div>
        </div>