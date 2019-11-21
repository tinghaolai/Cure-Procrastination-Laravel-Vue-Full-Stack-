<h1>Articles</h1>

<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<h1><a href="/articleadmin/create">Add New Article</a></h1>
<h1><a href="/tags/create">Add New Tag</a></h1>
<h1><a href="/articleadmin/deleted">Deleted Article</a></h1>


@forelse($articles as $article)
<p><strong>
<a href="/articleadmin/{{ $article-> id}}">{{ $article-> title }}</a>
</strong>{{$article->id}}</p>
@empty
    <p>No Articles to show</p>
@endforelse
