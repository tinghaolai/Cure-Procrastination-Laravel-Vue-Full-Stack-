@extends('layouts.app_articleadmin')

@section('content')

<a href="#" onclick="history.back();">Back</a>

<h1>Add New Article</h1>

<form action="/articleadmin" method="post" enctype="multipart/form-data">

    @include('articleadmin.form')

    <button>Add New Article</button>

</form>

@endsection
