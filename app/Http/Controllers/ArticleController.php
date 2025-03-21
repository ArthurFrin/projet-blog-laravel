<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category', 'media')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Validation pour une image (max 2Mo)
        ]);

        $article = Article::create($data);
        
        // Traitement de l'image s'il y en a une
        if ($request->hasFile('image')) {
            $article->addMediaFromRequest('image')
                   ->toMediaCollection('image');
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Validation pour une image (max 2Mo)
        ]);

        $article = Article::findOrFail($id);
        $article->updateWithCategory($data);
        
        // Traitement de l'image s'il y en a une nouvelle
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image s'il y en avait une
            $article->clearMediaCollection('image');
            
            // Ajouter la nouvelle image
            $article->addMediaFromRequest('image')
                   ->toMediaCollection('image');
        }

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);

        return redirect()->route('articles.index');
    }
}
