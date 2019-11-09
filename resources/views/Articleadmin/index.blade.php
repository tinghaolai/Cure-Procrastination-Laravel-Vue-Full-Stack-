<h1>Articles</h1>

<h1><a href="/articleadmin/create">Add New Article</a></h1>

@forelse($articles as $article)
<p><strong>
<a href="/articleadmin/{{ $article-> id}}">{{ $article-> title }}</a>
</strong>{{$article->id}}</p>
@empty
    <p>No Customers to show</p>
@endforelse
