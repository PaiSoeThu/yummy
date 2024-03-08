@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Create New Article</h3>
    <hr>
    <form action="{{ route('article.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="" value="{{old('title')}}">
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid  @enderror" value="{{old('description')}}"></textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        
        <button class="btn btn-primary">Save Article</button>
    </form>
    
</div>
    @endsection