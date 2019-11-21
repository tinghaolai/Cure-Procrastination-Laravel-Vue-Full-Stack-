@extends('layouts.app_articleadmin')

@section('content')

<h1>Articles</h1>

<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@can('create', App\Article::class)
<h1><font color="red">Welcome Admin</font></h1>
@else()
<h1><font color="red">All RESTful api doesn't working because of authorize</font></h1>
@endcan
<h1><a href="{{route('articleadmin.create')}}">Add New Article</a></h1>
<h1><a href="{{route('tags.create')}}">Add New Tag</a></h1>
<h1><a href="{{route('articleadmin.index_deleted')}}">Deleted Article</a></h1>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success')}}
</div>
@endif

@forelse($articles as $article)
<p><strong>
<a href="{{route('articleadmin.show', ['article' => $article])}}">{{ $article-> title }}</a>
</strong>{{$article->id}}</p>
@empty
    <p>No Articles to show</p>
@endforelse

@endsection
