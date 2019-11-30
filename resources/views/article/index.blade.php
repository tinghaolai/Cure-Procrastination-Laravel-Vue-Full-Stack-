@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" >
        <div class="col" id="articles">
            <div class="inline-block flex justify-end ">
                <form action="{{ route('article.index')}}" style="display: inline;">
                    <select class="mr-1 appearance-none bg-gray-200 border border-gray-200 text-gray-700 p-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="sort">
                            <option value='{"filt":"asc","target":"title"}'>Title</option>
                            <option value='{"filt":"desc","target":"title"}'>Title(desc)</option>
                            <option value='{"filt":"asc","target":"created_at"}'>Date</option>
                            <option value='{"filt":"desc","target":"created_at"}'>Date(desc)</option>
                    </select>
                    <span>Sort Articles</span>
                    <input type="checkbox" class="ml-6 form-checkbox" name="active" value="true"> <span>With Picture</span>
                    <button type="submit" value="sent" class="font-bold ml-3 px-2 py-1 focus:outline-none" type="button">Sent</button>
                </form>
            </div>

            <b-card-group>
                @foreach($articles as $article)

                @if($article->image)
                    <Info title="{{$article->title}}" body="{{$article->body}}" article_href="{{ $article->path()}}" :tags="{{ ($article->tags) }}" image={{asset('storage/'.$article->image)}}></Info>
                @else
                    <Info title="{{$article->title}}" body="{{$article->body}}" article_href="{{ $article->path()}}" :tags="{{ ($article->tags) }}" image={{asset('storage/defaults/article_default.jpg')}}></Info>

                @endif
                @endforeach
            </b-card-group>
            <div class="mb-2 col-12 flex justify-center " >
                {{ $articles->appends(request()->input())->links()}}
            </div>
        </div>
        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
