<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\post;
use App\Models\TextWidget;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('id' , 'desc')
            ->paginate(10)
        ;
        $categories = Category::all();
        return view('home' , compact('posts' , 'categories') );
    }

    public function show(post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $comments = Comment::where('post_id' , '=' , $post->id)->get();

        return view('post.view' , compact('post' , 'comments'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::query()
            ->join('category_post' , 'posts.id' , '=' , 'category_post.post_id')
            ->where('category_post.category_id' , '=' , $category->id)
            ->orderBy('post_id' , 'desc')
            ->paginate(10);

        return view('home',compact('posts'));
    }

    public function aboutUs()
    {
        $post = TextWidget::where('key' , '=' , 'about-us')->first();
        return view('post.aboutUs' , compact('post'));
    }

    public function comment(post $post , Request $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id ,
            'comment_text' => $request->comment_text
        ]);

        $comments = Comment::where('post_id' , '=' , $post->id)->get();

        return redirect()->route('view' , compact('post' , 'comments'));
    }

    public function commentEdite(Comment $comment , Request $request)
    {
        $comment->update([
            'comment_text' => $request->comment_text,
        ]);
        return redirect()->back();

    }

    public function commentDelete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();

    }

}
