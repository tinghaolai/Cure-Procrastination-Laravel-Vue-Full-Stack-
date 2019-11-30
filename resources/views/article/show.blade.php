@extends('layouts.app')

@section('content')
@if($article->image)
@endif
<div class="table w-full">
        <div class="table-row">
          123
        </div>
        <div class="table-row">
          123
        </div>
      </div>
<div class="container-fluid" >

    <div class="row">
        <div class="col px-12 pb-6 mx-12 mb-3" id="article">
            <div class="title text-4xl mb-1">{{$article->title}}</div>
            <div class="flex">
                    <div class="w-1/3">
                        <i class="fa fa-eye" aria-hidden="true"></i><span class="info">Viewed: {{$article->viewed}}</span>
                    </div>
                    <div class="w-1/3">
                        <p class="info"><i class="fa fa-tag" aria-hidden="true"></i>Tag:
                                @forelse($article->tags as $tag)
                                <span>
                                    <a href="{{route('tag.show', ['tag_id' => $tag])}}">{{$tag->name}}</a>
                                </span>
                                @empty
                                    <p>No Tags</p>
                                @endforelse
                        </p>
                    </div>
                    <div class="w-1/3">
                        <div class="info"><i class="fa fa-clock-o" aria-hidden="true"></i>
                             Time:{{$article->created_at}}</div>
                    </div>
                  </div>
                <p class="text-xl" id="content">{{$article->body}}</p>

                <hr class="m-5">


                <div class="px-5 py-4" id="comments">
                    <span class="text-2xl">Comments:</span>
                    @forelse($article->comments as $comment)
                        <div class="my-4 p-2 comment" >
                            <i class="fa fa-user fa-3x float-left mr-3" aria-hidden="true"></i>
                            <div class="user">Guest: </div>
                            <div class="content">{{$comment->body}}</div>
                            <div class="time static right:0 bottom-0 text-right">00:00:00 UTC on 1 January 1970</div>
                        </div>
                    @empty
                        <p>No Comments</p>
                    @endforelse
                    <div></div>
                    <form action="{{route('comment.store', ['id' => $article])}}" method="post">
                        <div class="">
                            <div class="text-lg ml-4 text-blue-700">Add Comments</div>
                            <b-col>
                                <b-form-textarea
                                    class="m-2"
                                    name="body"
                                    id="textarea-small"
                                    size="sm"
                                    placeholder="Leave Comment"
                                ></b-form-textarea>
                            </b-col>
                            <div class="flex justify-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
                                @error('body') <p style="color:red;">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection

