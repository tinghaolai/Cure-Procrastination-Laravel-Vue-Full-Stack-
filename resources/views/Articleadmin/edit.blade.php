<h1>Editing </h1>


<form action="/articleadmin/{{$article->id}} " method="post" enctype="multipart/form-data">

    @method('PATCH')

    @include('articleadmin.form')

    <button>Save Article</button>
    @if($article->image)
        <input type="checkbox" name="delImage" value="Bike"> Delete Image<br>
        <div class="col-12"><img src="{{ asset('storage/' . $article->image)}}" alt="" class="img-thumbnail"></div>
    @endif
</form>


