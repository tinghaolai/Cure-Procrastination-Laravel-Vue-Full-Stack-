@extends('layouts.app_articleadmin')

@section('content')

<a href="#" onclick="history.back();">Back</a>

<h1>Add New Tag</h1>
<br>
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success')}}
    </div>
@endif
<br>
<form action="/tags" method="post">

<div>
    <label for="name">Tag Name</label>
    <input type="text" name="name" autocomplete="off" value="{{ old('name')}}">
    @error('name') <p style="color:red;">{{ $message }}</p> @enderror
</div>
@csrf

    <button>Add New Tag</button>

</form>
<br>

<div>
    <a href="/articleadmin">Back</a>
</div>
<br>
<div>Current Tags:</div>
@forelse ($tags as $tag)
    <div>
        <form action="/tags/{{ $tag->id }}" method="post">
            {{$tag->name}}
            @method('DELETE')
            @csrf
            <button>Delete</button>
        </form>
    </div>
@empty
    <div>No Tags</div>
@endforelse


@endsection
