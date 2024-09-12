<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Added for auth()->id()

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('articles.index', compact('articles'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id(); // Add this line to associate the article with the current user

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article_images', 'public');
            $data['image'] = $imagePath;
        }

        Article::create($data);

        return redirect()->route('admin/articles')->with('success', 'Article added successfully');
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

        return view('articles.edit', compact('article'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('article_images', 'public');
            $data['image'] = $imagePath;
        }

        $article->update($data);

        return redirect()->route('admin/articles')->with('success', 'Article updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('admin/articles')->with('success', 'Article deleted successfully');
    }
 
    /**
     * User index method for normal users.
     */
    public function userIndex()
    {
        $articles = Article::with('user')->orderBy('created_at', 'DESC')->get();
        return view('articles.user_index', compact('articles'));
    }
 
    /**
     * User show method for normal users.
     */
    public function userShow(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}