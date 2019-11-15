@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" >
        <div class="col " >
            <b-card-group>
                @foreach($articles as $article)
                @if($article->image)
                    <Info title="{{$article->title}}" body="{{$article->body}}" id="{{$article->id}}" :tags="{{ ($article->tags) }}" image={{asset('storage/'.$article->image)}}></Info>
                @else
                   <Info title="{{$article->title}}" body="{{$article->body}}" id="{{$article->id}}" :tags="{{ ($article->tags) }}" image={{asset('storage/defaults/0bR9RJ4.jpg')}}></Info>
                @endif

                @endforeach
            </b-card-group>
            <div class="col-12 text-center" >
                {{$articles->links()}}
            </div>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
