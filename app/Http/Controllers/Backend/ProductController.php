<?php

namespace App\Http\Controllers\Backend;

use App\Model\ProductImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ProductController extends Controller
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
    public function index(Product $product)
    {
        $products = $product::all();
        return view('pages.backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Category $category)
    {
        $categories = $category::all();
        $products = $product::all();
        return view('pages.backend.products.create', compact(['categories', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit_price' => $request->unit_price,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ];

        $this->validate($request, [
            'slug' => 'unique:products,slug',
        ]);

        $objProduct = new Product($data);
        $objProduct->save();

        // Get latest insert id
        $productId = $objProduct->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.jpg';
            $destinationPath = public_path('uploads/' . $productId);

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 666, true);
            }

            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            if ($img->save($destinationPath . '/' . $fileName)) {

                // Insert to image model
                $objProductImage = new ProductImage([
                    'name' => $fileName,
                    'product_id' => $productId,
                    'is_standard' => 1
                ]);

                $objProductImage->save();
            }
        }

        return redirect()->route('backend.products.index')->withSuccess('Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
