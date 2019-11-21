<a href="#" onclick="history.back();">Back</a>

<h1>Deleted Articles</h1>

<h1><a href="/articleadmin">Back</a></h1>


@forelse($articles as $article)
<p><strong>
        <a href="/articleadmin/deleted/{{ $article-> id}}">{{ $article-> title }}</a>
    </strong>{{$article->id}}</p>
@empty
<p>No Articles to show</p>
@endforelse
