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
            <p class="text-success">Tag:</p>

            All Comments:
            @forelse($comments as $comment)
                <div>{{$comment->body}}</div>

            @empty
                <p>No Comments</p>
            @endforelse




            <form action="/comments/{{$article->id}}" method="post">
                <div>
                        <label for="title">Add Comments</label>

                        <div>
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

