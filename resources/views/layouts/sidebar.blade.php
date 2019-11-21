
<div id="sidebar">
    <h3>Tag</h3>
    <hr>
    @foreach ($tags as $tag)
    <div>
    <a href="{{route('tag.show', ['tag_id' => $tag])}}">{{$tag->name}}</a>
    </div>

    @endforeach

    <h3>Rencent Added:</h3>

    @foreach ($recent as $article)
       <div>
       <a href="{{route('article.show', ['article' => $article])}}}"> {{$article->title}}</a>
        </div>
    @endforeach


</div>



