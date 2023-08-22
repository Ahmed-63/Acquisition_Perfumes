<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'picture' => 'required|image|max:1024',
        ]);

        $chemin_image = $request->picture->store("posts");

        $post = $request->user()->posts()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'picture' => $chemin_image,
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        
        $comments = $post->comments; // Récupérer les commentaires associés à l'article
        return view('posts.show', compact('post', 'comments')); // Passer la variable $comments à la vue
    }

    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

        if ($request->has("picture")) {
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        if ($request->has("picture")) {
            Storage::delete($post->picture);
            $chemin_image = $request->picture->store("posts");
        }

        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content
        ]);

        return redirect(route("posts.show", $post));
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->picture);
        $post->delete();
        return redirect(route('posts.index'));
    }
    public function showPresentationPage()
    {
        $latestPosts = Post::latest()->take(3)->get();

        return view('home', compact('latestPosts'));
    }
    
}

