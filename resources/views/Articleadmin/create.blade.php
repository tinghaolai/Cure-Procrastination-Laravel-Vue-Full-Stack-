<h1>Add New Article</h1>

<form action="/articleadmin" method="post">

    @include('articleadmin.form')
    <div>Tag:</div>
    @forelse ($tags as $tag)
    <input type="checkbox" name="tag" value={{$tag->name}}>{{$tag->name}}
    <br>
    @empty
     <div>No Tags</div>
    @endforelse

    <button>Add New Article</button>

</form>
