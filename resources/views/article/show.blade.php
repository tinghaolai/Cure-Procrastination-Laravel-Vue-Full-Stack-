@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" >

        <div class="col text-success" >
            <h2>{{$article->title}} </h2>
                <br><br>
            <p>{{$article->body}}</p>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <p class="text-success">Tag:
                @forelse($article->tags as $tag)
                <span>
                    <a href="/tags/{{$tag->id}}">{{$tag->name}}</a>
                </span>

                @empty
                    <p>No Tags</p>
                @endforelse
            </p>

            <div></div>
            All Comments:
            @forelse($article->comments as $comment)
                <div>{{$comment->body}}</div>

            @empty
                <p>No Comments</p>
            @endforelse
            <div></div>
            <form action="/comments/{{$article->id}}" method="post">
                <div>
                        <label for="title">Add Comments</label>
                        <label for="body"></label>
                        <textarea name="body" autocomplete="off" ></textarea>
                        @error('body') <p style="color:red;">{{ $message }}</p> @enderror
                </div>

                 <button>Leave comment</button>
            </form>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection

