@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{$article->title}} <br><br>
            {{$article->body}} <br>
        </div>
        <div class="col col-lg-3">
            @include('layouts.sidebar')
        </div>

    </div>
</div>





@endsection
