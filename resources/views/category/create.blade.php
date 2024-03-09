@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Create New Article</h3>
    <hr>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="" value="{{old('title')}}">
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        
        <button class="btn btn-primary">Save Category</button>
    </form>
    
</div>
    @endsection