<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
        public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();

        return view('admin.posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $file_name = time().'.'.$request->image->extension();

        $upload = $request->image->move(
            public_path('images/posts/'),
            $file_name
        );

        $image = null;

        if($upload){
            $image = "/images/posts/".$file_name;
        }

        Post::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.posts.index');
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

    public function edit(string $id)
{
    $post = Post::find($id);
    $categories = Category::all();
    $users = User::all();

    return view('admin.posts.edit', compact('post', 'categories', 'users'));
}

    /**
     * Update the specified resource in storage.
     */
    
   public function update(Request $request, string $id)
{
    $post = Post::find($id);

    $post->title = $request->title;
    $post->description = $request->description;
    $post->content = $request->content;
    $post->category_id = $request->category_id;
    $post->user_id = $request->user_id;

    if($request->hasFile('image')){

        $file_name = time().'.'.$request->image->extension();

        $upload = $request->image->move(
            public_path('images/posts/'),
            $file_name
        );

        if($upload){
            $post->image = "/images/posts/".$file_name;
        }

    }else{

        $post->image = $request->old_image;

    }

    $post->save();

    return redirect()->route('admin.posts.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $post = Post::find($id);

    $post->delete();

    return redirect()->route('admin.posts.index');
}
}
