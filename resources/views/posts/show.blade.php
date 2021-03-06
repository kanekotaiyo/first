<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        <h1>Blog Name</h1>
        <p class="edit">
            [<a href="/posts/{{ $post->id }}/edit">edit</a>]
        </p>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline" type="submit">
            @csrf
            @method('DELETE')
            <p class="delete">
                [<span onclick="return deletePost(this);">delete</span>]
            </p>
        </form>
        <div class='post'>
            <h2 class='title'>{{ $post->title }}</h2>
            <p class='body'>{{ $post->body }}</p>
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <p class='updated_at'>{{ $post->updated_at }}</p>
        </div>
        <div class='back'>
            <a href='/'>back</a>
        </div>
        <script>
        function deletePost(e){
            'use strict';
            if (confirm('削除すると復元できません\n本当に削除しますか？')){
                document.getElementById('form_{{ $post->id }}').submit();
            }
        }
        </script>
        @endsection
    </body>
</html>