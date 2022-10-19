@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ol>
    </div>
    @endif
    <form method="post">
        @csrf
        <div class=" form-floating mb-3">
            <input type="text" class="form-control" placeholder="title" name="title">
            <label for="floatingInput">Title</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="body" name="body"></textarea>
            <label for="floatingInput">Body</label>
        </div>
        <div class="mb-3">
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
</div>
</form>
@endsection