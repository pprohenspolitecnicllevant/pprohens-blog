<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at" , "desc")->where('posted', 'yes')->get();
        return view('post.index', compact('posts'));
    }

    public function myPosts()
    {
        $posts = Post::orderBy("created_at" , "desc")->where('user_id', Auth::id())->get();
        return view('post.my-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request):RedirectResponse
    {
        $post = new Post();

        $post->title = $request->title;
        $post->url_clean = $request->url_clean;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id= Auth::id();

        $post->save();

        // Sicronitzem tags
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('post.my-posts')->with('success', __('Post creat correctament'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post):View
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post):RedirectResponse
    {
        $post->update($request->all());

        // Sicronitzem tags
        $post->tags()->sync($request->input('tags', []));

        return redirect()->route('post.my-posts')->with('success', __('Post actualitzat correctament'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', __('Post ELIMINAT correctament'));
    }
}
