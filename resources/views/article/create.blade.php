@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Create New Article</h3>
    <hr>
    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- title  --}}
        <div class="mb-3">
            <label for="" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="" value="{{old('title')}}">
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- category --}}
        <div class="mb-3">
            <label for="" class="form-label">Select Category</label>
            <select name="category" id="cars" class="form-select @error('category') is-invalid  @enderror" id="" value="{{old('category')}}">
                @foreach ( App\Models\Category::all() as $category )
                <option value="{{ $category->id }}"
                {{ old('category') == $category->id ? "selected" : " " }}>
                {{ $category->title}}</option>
                @endforeach
              </select>

            @error('category')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        {{-- description  --}}
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="5" class="form-control @error('description') is-invalid  @enderror" value="{{old('description')}}"></textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        {{-- upload image  --}}
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            {{-- <textarea name="description" id="" cols="30" rows="5" class="form-control @error('description') is-invalid  @enderror" value="{{old('description')}}"></textarea> --}}
            <input type="file" name="featured_image" id="" class="form-control @error('featured_image') is-invalid  @enderror">
            
            @error('featured_image')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        
        <button class="btn btn-primary">Save Article</button>
      
    </form>
    
</div>
    @endsection