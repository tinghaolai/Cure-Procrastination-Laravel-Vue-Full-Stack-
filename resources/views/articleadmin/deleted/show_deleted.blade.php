@extends('layouts.app_articleadmin')

@section('content')

<h1>Article(Deleted)</h1>

<a href="{{route('articleadmin.index_deleted')}}">Back</a>
<br>
<strong>Title</strong>
<p>{{ $article->title }}</p>

<strong>Content</strong>
<p>{{ $article->body }}</p>


<div>
<form action="{{route('articleadmin.restore_deleted', ['article' => $article])}}" method="post">
    @method('PATCH')
    @csrf
    <button>Restore</button>
</form>


<form action="{{route('articleadmin.forceDelete_deleted', ['article' => $article])}}}" method="post">
    @method('DELETE')
    @csrf
    <button>Fully Delete</button>
</form>

<img src="" alt="">
    @if($article->image)
    <div class="col-12"><img src="{{ asset('storage/' . $article->image)}}" alt="" class="img-thumbnail"></div>
    @endif
</div>

@endsection
