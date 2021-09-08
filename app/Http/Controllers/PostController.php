<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->get()]);  
    }
    /**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    public function create(Post $post)
    {
        return view('create');
    }
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    public function store(Request $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
    
}


?>