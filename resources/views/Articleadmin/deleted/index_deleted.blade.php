@extends('layouts.app_articleadmin')

@section('content')

<a href="#" onclick="history.back();">Back</a>

<h1>Deleted Articles</h1>



@forelse($articles as $article)
<p><strong>
        <a href="{{route('articleadmin.show_deleted', ['article' => $article])}}">{{ $article-> title }}</a>
    </strong>{{$article->id}}</p>
@empty
<p>No Articles to show</p>
@endforelse
@endsection
