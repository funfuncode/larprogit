<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoriesCreateRequest;

use App\Category;

class AdminCategoriesController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $categories = Category::all();

      return view('admin.categories.index')->with('categories', $categories);
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $categories = Category::all();
      return view('admin.categories.index')->with('categories', $categories);
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(CategoriesCreateRequest $request)
   {
      $input = $request->all();

      Category::create($input);

      $request->session()->flash('category_created', 'Category has been successfully created');

      return redirect('/admin/categories');
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
      $category = Category::findOrFail($id);

      return view('admin.categories.edit')->with('category', $category);
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(CategoriesCreateRequest $request, $id)
   {
      $input = $request->all();

      $category = Category::findOrFail($id);

      $category->update($input);

      $request->session()->flash('category_updated', 'Category has been updated');

      return redirect('/admin/categories');
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Request $request, $id)
   {
      $category = Category::findOrFail($id);

      $category->delete();

      $request->session()->flash('category_deleted', 'category has been deleted');

      return redirect('/admin/categories');
   }
}
