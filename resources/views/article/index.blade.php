@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ul>
                @foreach($articles as $article)
                <Info title="{{$article->title}}" body="{{$article->body}}" id="{{$article->id}}"></Info>

                @endforeach
            </ul>
            <div class="col-12 text-center">
                {{$articles->links()}}
            </div>
        </div>
        <div class="col col-lg-3">
            @include('layouts.sidebar')
        </div>

    </div>
</div>





@endsection
