@extends('layouts.app')
@section('content')
<div class="container">

    <h3>Article Detail</h3>
    <hr>

    <table class="table">
     <tr>
         <td>Title</td>
         <td>{{ $article->title }}</td>
     </tr>
     <tr>
         <td>Description</td>
         <td>{{ $article->description }}</td>
     </tr>
     <tr>
        <td>Image</td>
        <td><img src="{{ asset("storage/".$article->featured_image) }}" alt="" width="200px" height="200px" class="object-fit-cover"></td>
    </tr>

     <tr>
         <td>Created At</td>
         <td>{{ $article->created_at }}</td>
     </tr>
     <tr>
         <td>Updated At</td>
         <td>{{ $article->updated_at }}</td>
     </tr>
    </table>
    <a href="{{ route('article.index') }}" class="btn btn-primary">Back</a>
    </div>
    @endsection