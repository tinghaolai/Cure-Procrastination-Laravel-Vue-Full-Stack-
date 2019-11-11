@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" >

        <div class="col " >

            <h2 class="text-success">{{$article->title}} </h2>
                <br><br>
            <p class="text-success">{{$article->body}}</p>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <p class="text-success">Tag:</p>
        </div>

        <div class="col col-lg-3 rounded" id="sidebar">
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection

