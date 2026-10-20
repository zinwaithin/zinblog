<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->orderBy('id', 'DESC')
            ->paginate(5);

        $categories = Category::all();

        return view('front.index', compact('posts', 'categories'));
    }

    public function show(string $id)
        {
            $post = Post::with(['user', 'category'])->findOrFail($id);

            return view('front.show', compact('post'));
        }

    public function category(string $id)
        {
            $category = Category::findOrFail($id);

            $posts = Post::with(['user', 'category'])
                ->where('category_id', $id)
                ->orderBy('id', 'DESC')
                ->paginate(5);

            $categories = Category::all();

            return view('front.index', compact('posts', 'categories', 'category'));
        }

    public function search(Request $request)
        {
            $keyword = $request->search;

            $posts = Post::with(['user', 'category'])
                ->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate(5);

            $categories = Category::all();

            return view('front.index', compact('posts', 'categories', 'keyword'));
        }
}