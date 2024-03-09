@extends('layouts.app')

@section('content')
<div class="container">

    <h4>Article List</h4>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <hr>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-3">
                <div class="mb-5">
                    <a href="{{ route('article.create') }}" class="btn btn-outline-dark">Create</a>
                </div>
            </div>
            <div class="col-4">
                <form action="{{ route('article.index') }}" method="get" class="">
                    <div class="input-group">
                        <input type="text" 
                        class="form-control" 
                        name="keyword"
                        @if (request()->has('keyword'))
                            value="{{ request()->keyword }}"
                        @endif                
                        >
                        @if (request()->has('keyword'))
                        <a href="{{ route('article.index') }}" class="btn btn-sm pt-2 btn-outline-secondary" ><i class="bi bi-backspace"></i></a>
                      @endif
                        <button class="btn btn-sm btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
 
    
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Category</td>
                <td>Owner</td>
                <td>Action</td>
                <td>Created At</td>
                <td>Updated At</td>

            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>
                    {{ $article->title }}
                    <br>
                    <span class="small text-black-50">
                        {{ substr($article->description,0,20) }}
                    </span>
                </td>

               
                <td>
                    {{ $article->category_id }}
                </td>
                <td>
                    {{ $article->user_id }}
                </td>
                <td>
                    <div class="">

                        <a href="{{ route('article.show',$article->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-info"></i>
                        </a>
                        @can('update',$article)
                        <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        @endcan
                        
                        @can('delete',$article)
                        <button form="form{{ $article->id }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash3"></i>
                        </button>
                        @endcan
                    </div>
                </td>
                <td>{{ $article->created_at->diffforhumans()}}</td>
                <td>{{ $article->updated_at->diffforhumans()}}</td>

                <form id="form{{ $article->id }}" action="{{ route('article.destroy',$article->id) }}" method="post" class='d-inline-block'>
                    @method('delete')
                    @csrf
                  
                </form>
            </tr>
            @empty
            <tr>
            <td colspan="5" class="text-center">
              There is no records <br><br>
              <a href="{{ route('article.create') }}" class="btn btn-outline-primary btn-sm"> Create Category</a>
            </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $articles->onEachSide(1)->links() }}
</div>
@endsection