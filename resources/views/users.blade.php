@extends('layouts.app')

@section('content')

<div class="container">

    <h4>User List</h4>
    <hr>
   
    
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Information</td>
                <td>Category Count</td>
                <td>Article Count</td>
                <td>Created At</td>
                <td>Updated At</td>

            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    {{ $user->name }}
                    <br>
                    <span class="small text-black-50">
                        {{ $user->email }}
                    </span>
                </td>
                <td>{{ $user->categories->count() }}</td>
                <td>{{$user->articles->count() }}</td>

                <td>{{ $user->created_at->diffforhumans()}}</td>
                <td>{{ $user->updated_at->diffforhumans()}}</td>

            </tr>
            @empty
          
            @endforelse
        </tbody>
    </table>
    {{ $users->onEachSide(1)->links() }}
</div>
@endsection