
<div id="sidebar">
    <h3>Tag</h3>
    <hr>
    @foreach ($tags as $tag)
    <div>
    <a href="/tags/{{$tag->id}}">{{$tag->name}}</a>
    </div>

    @endforeach

    <h3>Rencent Added:</h3>

    @foreach ($recent as $article)
       <div>
       <a href="/articles/{{$article->id}}"> {{$article->title}}</a>
        </div>
    @endforeach


</div>



