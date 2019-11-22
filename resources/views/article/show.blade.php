@extends('layouts.app')

@section('content')
@if($article->image)
<div class="col-12"><img src="{{ asset('storage/' . $article->image)}}" alt="" class="img-thumbnail"></div>
@endif
<div class="container-fluid">
    <div class="row" >

        <div class="col text-success" >
        <h2>{{$article->title}} </h2>
        <span>Viewed: {{$article->viewed}}</span>
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
                    <a href="{{route('tag.show', ['tag_id' => $tag])}}">{{$tag->name}}</a>
                </span>

                @empty
                    <p>No Tags</p>
                @endforelse
            </p>
        <div>Time:{{$article->created_at}}</div>
            <div></div>
            All Comments:
            @forelse($article->comments as $comment)
                <div>{{$comment->body}}</div>

            @empty
                <p>No Comments</p>
            @endforelse
            <div></div>
            <form action="{{route('comment.store', ['id' => $article])}}" method="post">
                <div>
                        <label for="title">Add Comments</label>
                        <label for="body"></label>
                        <textarea name="body" autocomplete="off" ></textarea>
                        @error('body') <p style="color:red;">{{ $message }}</p> @enderror
                </div>
                        @csrf
                 <button>Leave comment</button>
            </form>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection

