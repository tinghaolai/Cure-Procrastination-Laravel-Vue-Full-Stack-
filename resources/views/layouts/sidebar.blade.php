
<div id="sidebar">
    <h3>Tag</h3>
    <hr>
    @foreach ($tags as $tag)
       <div>{{$tag->name}}</div>
    @endforeach

    <h3>Rencent Added:</h3>

    @foreach ($recent as $article)
       <div>{{$article->title}}</div>
    @endforeach


</div>



