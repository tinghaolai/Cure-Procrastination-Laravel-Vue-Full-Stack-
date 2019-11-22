@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" >
        <div class="col " >
            <form action="{{ route('article.index')}}">
                <input type="checkbox" name="active" value="true"> <span class="alert-primary">With Picture</span>
                <select name="sort">
                    <option value='{"filt":"asc","target":"title"}'>Title</option>
                    <option value='{"filt":"desc","target":"title"}'>Title(desc)</option>
                    <option value='{"filt":"asc","target":"created_at"}'>Date</option>
                    <option value='{"filt":"desc","target":"created_at"}'>Date(desc)</option>
                </select>
                <input type="submit" value="sent">
            </form>

            <b-card-group>
                @foreach($articles as $article)
                @if($article->image)
                    <Info title="{{$article->title}}" body="{{$article->body}}" article_href="{{ $article->path()}}" :tags="{{ ($article->tags) }}" image={{asset('storage/'.$article->image)}}></Info>
                @else
                   <Info title="{{$article->title}}" body="{{$article->body}}" article_href="{{ $article->path()}}" :tags="{{ ($article->tags) }}" image={{asset('storage/defaults/0bR9RJ4.jpg')}}></Info>
                @endif

                @endforeach
            </b-card-group>
            <div class="col-12 text-center" >
                {{ $articles->appends(request()->input())->links()}}

            </div>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
