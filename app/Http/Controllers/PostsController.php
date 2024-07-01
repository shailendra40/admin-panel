<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('categories')->get();

        return view('admin.posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'image' => 'required|image|max:19999',
            'documents.*' => 'required|mimes:pdf,doc,docx|max:79999',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }

        // Initialize an array to store the document paths
        $documentPaths = [];
        // Check if the documents are uploaded
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                // Store each document and add its path to the array
                $documentPaths[] = $document->store('documents');
            }
        }

        // Create the post with 'documents' field as json
        $post = Post::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image'],
            'category_id' => $validatedData['category_id'],
            'documents' => json_encode($documentPaths), // Storing documents paths as a JSON string
        ]);

        // Redirect with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }











    // ... other methods ...

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id', // Correct validation for a single ID
        ]);

        // Handle the file upload and save logic here
        // ... (your file handling code should be here)

        // Update the post
        $post->update($validatedData);

        // Sync the selected category ID with the post
        $post->categories()->sync([$request->input('category_id')]); // Wrap the single ID in an array for sync method

        // Redirect with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    }
}
