<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Posts\Entities\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Auth()->user()->posts;
        return Inertia::render('Posts::Home', [
            'posts' => $posts,
            'auth' => auth()->user()->hasRole('admin'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // dd(User::find(1)->posts);

        return Inertia::render('Posts::Create', [
            'auth' => auth()->user()->hasRole('admin'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // $post = new Post;
        // $post -> title = $request -> title;
        // $post -> content = $request -> content;
        // $post -> save();
        $validatedData = $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $validatedData['user_id'] = Auth()->user()->id;
        
        Post::create($validatedData);
        return redirect('/posts');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts::Show', [
            'post' => $post,
            'auth' => auth()->user()->hasRole('admin'),
        ]);    
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts::Edit',[
            'post' => $post,
            'auth' => auth()->user()->hasRole('admin'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        Post::where('id', $id)
            ->update($request->validate([
                'title' => ['required'],
                'content' => ['required'],
            ]));
        
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
    }
}
