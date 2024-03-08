@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Edit Article</h3>
    <hr>
    <form action="{{ route('category.update',$category->id) }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Category Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="" value="{{old('title',$category->title)}}">
            @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
       
        
        <button class="btn btn-primary">Update Category</button>
    </form>
    
</div>
    @endsection