<h1>Editing </h1>


<form action="/articleadmin/{{$article->id}} " method="post">

    @method('PATCH')

    @include('articleadmin.form')
    <button>Save Article</button>
</form>


@if($article->image)
<div class="col-12"><img src="{{ asset('storage/' . $article->image)}}" alt="" class="img-thumbnail"></div>
@endif
