<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function home(){

        $featuredPosts=Post::where('is_featured','1')->get();
        $lastPosts=Post::orderBy('created_at','desc')->get();
        return view('homepage', compact('featuredPosts','lastPosts'));

    }
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();;
        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post-create', );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Post::create($request->data);
            return redirect()->back()->with('success', 'Yeni Yazı Eklendi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Yazı Ekleme Başarısız');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {   
        try {
            $clickedPost=Post::where('slug',$post)->firstOrfail();
            $lastPosts=Post::orderBy('created_at','desc')->paginate(6);

            return view('post-show',compact('clickedPost','lastPosts'));

        } catch (\Throwable $th) {
            return redirect()->with('error', 'post Bulunamadı');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
