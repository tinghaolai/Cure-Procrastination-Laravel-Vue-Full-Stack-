<h1>Editing </h1>


<form action="/articleadmin/{{$article->id}} " method="post">

    @method('PATCH')

    @include('articleadmin.form')

    <button>Save Article</button>
</form>
