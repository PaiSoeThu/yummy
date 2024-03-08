@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Edit Article</h3>
    <hr>
    <form action="{{ route('article.update',$article->id) }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="" value="{{old('title',$article->title)}}">
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Select Category</label>
            <select name="category" id="cars" class="form-select @error('category') is-invalid  @enderror" id="" value="{{old('category')}}">
                @foreach ( App\Models\Category::all() as $category )
                <option value="{{ $category->id }}"
                {{ old('category',$article->category_id) == $category->id ? "selected" : " " }}>
                {{ $category->title}}</option>
                @endforeach
              </select>

            @error('category')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid  @enderror" value="">{{old('description',$article->description)}}</textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
       
        
        <button class="btn btn-primary">Update Article</button>
    </form>
    
</div>
    @endsection