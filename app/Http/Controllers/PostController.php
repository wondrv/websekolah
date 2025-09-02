<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')->latest('published_at')->paginate(9);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // ADMIN:
    public function create()
    {
        return view('admin.posts.form', ['post' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = $r->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'type' => 'required|in:news,announcement',
            'excerpt' => 'nullable',
            'body' => 'required',
            'published_at' => 'nullable|date',
            'cover' => 'nullable|image|max:2048'
        ]);
        if ($r->hasFile('cover')) {
            $data['cover_path'] = $r->file('cover')->store('public/covers');
            $data['cover_path'] = str_replace('public', 'storage', $data['cover_path']);
        }
        $data['user_id'] = Auth::user()->id;
        $post = Post::create($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Post dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Post $post)
    {
        $data = $r->validate([
            'title' => 'required',
            'slug' => "required|unique:posts,slug,{$post->id}",
            'type' => 'required|in:news,announcement',
            'excerpt' => 'nullable',
            'body' => 'required',
            'published_at' => 'nullable|date',
            'cover' => 'nullable|image|max:2048'
        ]);
        if ($r->hasFile('cover')) {
            $data['cover_path'] = $r->file('cover')->store('public/covers');
            $data['cover_path'] = str_replace('public', 'storage', $data['cover_path']);
        }
        $post->update($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Post diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('ok', 'Post dihapus');
    }
}
