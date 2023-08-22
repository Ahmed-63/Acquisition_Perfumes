<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('comments.index', [
            'comments' => Comment::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'message' => 'required|string|max:255',
        'post_id' => 'required|exists:posts,id',
    ]);

    $post = Post::findOrFail($validated['post_id']);

    $comment = new Comment([
        'message' => $validated['message'],
    ]);

    // Associez l'utilisateur authentifié au commentaire
    $comment->user_id = auth()->user()->id;

    $post->comments()->save($comment);

    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
}


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment): View
    {
        $this->authorize('update', $comment);
        return view('comments.edit', [
             'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment): RedirectResponse
{
    $this->authorize('update', $comment);

    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);

    $comment->update($validated);

    return redirect()->route('posts.show', $comment->post_id)
        ->with('success', 'Comment mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
{
    $this->authorize('delete', $comment);

    $postId = $comment->post_id; // Récupérer l'identifiant du post associé au comment

    $comment->delete();

    return redirect()->route('posts.show', ['post' => $postId])->with('success', 'Comment supprimé avec succès.');
}

}
