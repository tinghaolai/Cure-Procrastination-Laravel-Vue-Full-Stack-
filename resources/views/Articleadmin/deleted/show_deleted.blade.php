<h1>Article(Deleted)</h1>

<a href="/articleadmin/deleted">Back</a>
<br>
<strong>Title</strong>
<p>{{ $article->title }}</p>

<strong>Content</strong>
<p>{{ $article->body }}</p>


<div>
<form action="/articleadmin/deleted/{{ $article->id }}" method="post">
    @method('PATCH')
    @csrf
    <button>Restore</button>
</form>


<form action="/articleadmin/deleted/{{ $article->id }}" method="post">
    @method('DELETE')
    @csrf
    <button>Fully Delete</button>
</form>

<img src="" alt="">
    @if($article->image)
    <div class="col-12"><img src="{{ asset('storage/' . $article->image)}}" alt="" class="img-thumbnail"></div>
    @endif
</div>
