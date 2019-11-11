@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" >

        <div class="col " >
            <b-card-group>
                @foreach($articles as $article)
                <Info title="{{$article->title}}" body="{{$article->body}}" id="{{$article->id}}" :tags="{{ ($article->tags) }}"></Info>

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
