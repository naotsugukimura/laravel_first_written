<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        
        <form action="/posts/{{ $post->id }}" id="form_delet" method="post" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">[<span onclick = "return deletePost(this);">delete</span>]</button>
        </form>
        
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">e dit</a>]</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
        
        <script>
        function deletePost(e){
            'use strict';
            if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById('form_delet').submit();
            }
        }
        </script>
    </body>
</html>