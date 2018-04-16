<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostsCreateRequest;

use App\Post;
use Auth;
use Carbon\Carbon;
use App\Photo;
use App\Category;

class AdminPostsController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $posts = Post::all();

      return view('admin.posts.index')->with('posts', $posts);
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $categories = Category::lists('name', 'id')->all();

      return view('admin.posts.create')->with('categories', $categories);
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(PostsCreateRequest $request)
   {
      $input = $request->all();

      $user_id = Auth::id();

      $input['user_id'] = $user_id;

      if($file = $request->file('photo_id')){
         $name = Carbon::now()->format('Y-m-d') . '_'. $file->getClientOriginalName();
         $file->move('images', $name);
         $photo = Photo::create(['file'=>$name]);
         $input['photo_id'] = $photo->id;
      }

      $post = Post::create($input);

      $request->session()->flash('post_created', 'Post has been successfully created');

      return redirect('/admin/posts');

   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      $post = Post::findOrFail($id);

      $categories = Category::lists('name', 'id')->all();

      return view('admin.posts.edit')->with(['post'=>$post, 'categories'=>$categories]);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(PostsCreateRequest $request, $id)
   {
      $input = $request->all();

      $post = Post::find($id);

      if($file = $request->file('photo_id')){
         $name = Carbon::now()->format('Y-m-d') . '_'. $file->getClientOriginalName();
         $file->move('images', $name);
         $photo = Photo::create(['file'=>$name]);
         $input['photo_id'] = $photo->id;
      }

      $post->update($input);

      $request->session()->flash('post_updated', 'Post has been successfully updated');

      return redirect('/admin/posts');
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Request $request, $id)
   {
      $post = Post::findOrfail($id);

      if($post->photo){
         unlink(public_path() . '/images/' . $post->photo->file);
      }

      $post->delete();

      $request->session()->flash('post_deleted', 'Post has been deleted');

      return redirect('/admin/posts');
   }
}
