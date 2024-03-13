<div class="position-sticky" style="top:80px">
   
    @auth

<aside>
    <p class="mt-3 my-2">Manage Inventory</p>

    <div class="list-group">
        <a href="{{route('article.index')}}" class="list-group-item list-group-item-action ">Article List</a>
        <a href="{{route('article.create')}}" class="list-group-item list-group-item-action ">Create Article</a>

    </div>

    @can('viewAny',App\Models\Category::class)
    <p class="mt-3 my-2">Manage Category</p>

    <div class="list-group">
        <a href="{{route('category.index')}}" class="list-group-item list-group-item-action ">Categories List</a>
        <a href="{{route('category.create')}}" class="list-group-item list-group-item-action ">Create Category</a>

    </div>
    @endcan

    @can('admin-only')
    <p class="mt-3 my-2">Members</p>
    <div class="list-group">
      
            <a class="list-group-item list-group-item-action" href="{{ route('users') }}">{{ __('User List') }}</a>
        
    </div>

@endcan
    

</aside>

@endauth
</div>