<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Category $category)
    {
        $categories = $category->paginate(10);
        return view('pages.backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status ?? 0
        ];

        $this->validate($request,[
            'slug' => 'unique:categories,slug,'.$id
        ]);

        $category = Category::findOrFail($id);
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
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('backend.categories.index')->withSuccess("Category successfully deleted");
    }
}
