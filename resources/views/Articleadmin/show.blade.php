<h1>Article</h1>

<a href="/articleadmin">Back</a>

<strong>Title</strong>
<p>{{ $article->title }}</p>

<strong>Content</strong>
<p>{{ $article->body }}</p>


<div>
<a href="/articleadmin/{{ $article->id}}/edit">Edit</a>

<form action="/articleadmin/{{ $article->id }}" method="post">
    @method('DELETE')
    @csrf

    <button>Delete</button>
</form>
</div>
