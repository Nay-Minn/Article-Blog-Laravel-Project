@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class=" card-title">{{$article->title}}</h5>
            <div class=" card-subtitle text-muted small">
                {{$article->created_at->diffForHumans()}}
                Category: <b>{{$article->category->name}}</b>,
                By : <b class="text-success">{{$article->user->name}}</b>

            </div>
            <p class=" card-text">
                {{$article->body}}
            </p>
            <button class=" btn btn-danger"><a class="card-link text-decoration-none text-white" href="{{url("/articles/delete/$article->id")}}">Delete</a></button>
            <button class=" btn btn-secondary"><a class="card-link text-decoration-none text-white" href="{{url("/articles/edit/$article->id")}}">Edit</a></button>
        </div>
    </div>

    @if ($errors->any())
    <div class=" alert alert-warning mt-3">
        <ol>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ol>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger mt-3">
        {{session('error')}}
    </div>
    @endif

    <ul class=" list-group my-3">
        <li class=" list-group-item active">
            <b>Comments ({{count($article->comments)}})</b>
        </li>
        @foreach ($article->comments as $comment)
        <li class="list-group-item">
            <a href="{{url("comments/delete/$comment->id")}}" class="btn-close float-end"></a>
            {{$comment->content}}
            <div class="small mt-2">
                By: <b>{{$comment->user->name}}</b>,
                {{$comment->created_at->diffForHumans()}}
            </div>

        </li>
        @endforeach
    </ul>
    @auth
    <form action="{{url('comments/add')}}" method="post">
        @csrf
        <input type="hidden" value="{{$article->id}}" name="article_id">
        <textarea name="content" class="form-control mb-1" placeholder="Write a comment..."></textarea>
        <input type="submit" value="Add Comment" class="btn btn-secondary">
    </form>
    @endauth

</div>

@endsection