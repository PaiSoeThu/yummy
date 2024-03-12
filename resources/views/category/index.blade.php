@extends('layouts.app')

@section('content')
<div class="container">

    <h4>Category List</h4>
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
                    <a href="{{ route('category.create') }}" class="btn btn-outline-dark">Create</a>
                </div>
            </div>
            <div class="col-4">
                <form action="{{ route('category.index') }}" method="get" class="">
                    <div class="input-group">
                        <input type="text" 
                        class="form-control" 
                        name="keyword"
                        @if (request()->has('keyword'))
                            value="{{ request()->keyword }}"
                        @endif                
                        >
                        @if (request()->has('keyword'))
                        <a href="{{ route('category.index') }}" class="btn btn-sm pt-2 btn-outline-secondary" ><i class="bi bi-backspace"></i></a>
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
                <td>Owner</td>
                <td>Action</td>
                <td>Created At</td>
                <td>Updated At</td>

            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    {{ $category->title }}
                </td>
            
                <td>
                    {{ $category->user->name}}
                </td>
             
                <td>
                    <div class="">

                        @can('update',$category) 
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        @endcan
                        @can('delete',$category) 
                        <button form="form{{ $category->id }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash3"></i>
                        </button>
                        @endcan
                    </div>
                </td>
                <td>{{ $category->created_at->diffforhumans()}}</td>
                <td>{{ $category->updated_at->diffforhumans()}}</td>

                <form id="form{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="post" class='d-inline-block'>
                    @method('delete')
                    @csrf
                  
                </form>
            </tr>
            @empty
            <tr>
            <td colspan="7" class="text-center">
              There is no records <br><br>
              <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-sm"> Create Category</a>
            </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $categories->onEachSide(1)->links() }}
</div>
@endsection