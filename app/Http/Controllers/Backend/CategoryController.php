<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('pages.backend.categories.index', ['categories' => $category->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('pages.backend.categories.create', ['categories' => $allCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'parent_id' => $request->parent_id ?? 0,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status ?? 0
        ];

        $this->validate($request, [
            'slug' => 'unique:categories,slug',
        ]);

        $category = new Category($data);
        $category->save();

        return redirect()->route('backend.categories.index')->withSuccess("Category successfully created");

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
        // die(var_dump($id));
        // Get all categories into select option
        $allCategories = Category::all();

        // Get info of editing category
        $category = Category::findOrFail($id);

        return view('pages.backend.categories.edit', ['categories' => $allCategories, 'category' => $category]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = [
            'parent_id' => $request->parent_id ?? 0,
            'name' => $request->name,
            'slug' => to_slug($request->name),
            'description' => $request->description,
            'status' => $request->status ?? 0
        ];

        $this->validate($request,[
            'slug' => 'unique:categories,slug,'.$id
        ]);
    

        $category = Category::find($id);

        $category->fill($data);
        $category->save();

        return redirect()->route('backend.categories.index')->withSuccess("Category successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        $category->delete();
        return redirect()->route('backend.categories.index')->withSuccess("Category successfully deleted");
    }
}
