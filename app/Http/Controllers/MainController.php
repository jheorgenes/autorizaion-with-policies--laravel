<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        // get all posts and their authors from database
        $posts = Post::with('user')->get();

        // return view('home', ['posts' => $posts]);
        return view('home', compact('posts'));
    }

    public function update($id)
    {
        $post = Post::find($id);

        // verify if the user is allowed to update the post
        if (Auth::user()->can('update', $post)) {
            echo 'O usuário pode atualizar esse post!';
        } else {
            echo 'O usuário não pode atualizar esse post!';
        }

    }

    public function delete($id)
    {
         $post = Post::find($id);

         // verify if the user is allowed to delete the post
         if (Auth::user()->can('delete', $post)) {
             echo 'O usuário pode deletar esse post!';
         } else {
             echo 'O usuário não pode deletar esse post!';
         }
    }
}
