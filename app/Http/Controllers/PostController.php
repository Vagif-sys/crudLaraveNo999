<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
       return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>['required','max:2028','image'],
            'title'=>['required','max:255'],
            'category'=>['required','integer'],
            'description'=>['required']
        ]);


        $filename = time().'.'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $filename);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->image = 'storage/'.$filePath;
        $post->save();

        return redirect()->route('posts.index');
        
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show',compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

   
    public function update(Request $request, $id)
    {
       
        $request->validate([
          
            'title'=>['required','max:255'],
            'category'=>['required','integer'],
            'description'=>['required']
        ]);
        
        $post = Post::find($id);

        if($request->hasFile('image')){

            $request->validate([
               'image'=>['required','max:2028','image'],
            ]);


           

            $filename = time().'.'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $filename);
           
            File::delete(public_path($post->image));

            $post->image = 'storage/'.$filePath;
        }

       
            $post->title = $request->title;
            $post->description = $request->description;
            $post->category_id = $request->category;

            $post->save();
        
        return redirect()->route('posts.index');
    }

 
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function trashed(){

        $posts = Post::onlyTrashed()->get();
        return view('trashed',compact('posts'));
    }

    public function restore($id){

        $post = Post::onlyTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->back();
    }

    public function forceDelete($id){
         
        $post = Post::onlyTrashed()->findOrFail($id);
        File::delete(public_path($post->image));
        $post->forceDelete();

        return redirect()->back();
    }
}
