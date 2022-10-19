@extends('layouts.app')

@section('content')
<div class="container">


    @if (session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
    @endif

    {{$articles->links()}}

    @foreach ($articles as $article)
    <div class=" card mb-2">
        <div class=" card-body">
            <h5 class=" card-title">{{$article->title}}</h5>
            <div class=" card-subtitle mb-2 text-muted small">
                {{$article->created_at->diffForHumans()}}
                By: <b class=" text-success"> {{$article->user->name}}</b>
            </div>
            <p class=" card-text">{{$article->body}}</p>
            <button class=" btn btn-primary">
                <a class="card-link text-decoration-none text-white" href="{{url("/articles/detail/$article->id")}}">View
                    Detail</a>
            </button>
        </div>
    </div>
    @endforeach
</div>
@endsection