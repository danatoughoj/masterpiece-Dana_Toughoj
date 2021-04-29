<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->getProductQuery();

        $this->applyFilters($products);

        return view("client.shop", [
            "products" => $products->paginate(request('items_count') ?? 12),
            "categories" => Category::latest()->get(),
            "title" => request('title') ?? null,
        ]);
    }
    public function adminIndex()
    {
        $products = Product::paginate(3);
        return view("admin.products",compact("products"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $status="add";
        return view('admin.products-form', compact('status','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            // 'name'        => 'required',
            // 'category_id' => 'required',
            // 'description' => 'required',
            // 'price'       => 'required',
            // 'in_stock    '=> 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        $request = request()->all();

        $request['characteristics']=[
            'color'    =>request()->color??'',
            'dimensions'=>request()->dimensions??'',
            'material' =>request()->material??''
        ];

        if(isset($request['cover_image'])){
            $request['cover_image'] = Storage::put('products',$request['cover_image']);
        }

        $product = Product::create($request);

        if(request()->hasFile('product_images')){
            $files = request()->file('product_images');
            foreach ($files as $file){
                $file_path = Storage::put('products',$file);
                $image = new Image();
                $image->path = $file_path;
                $image->type = "normal";
                $product->images()->save($image);
            }
        }



        session()->flash('message', 'Product Created');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = Image::where('product_id', $product->id)->where('type', 'normal')->get();
        return view("client.product-details", compact("product", "images"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $status="edit";
        return view('admin.products-form', compact('product','status','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate(request(),[
               // 'name'        => 'required',
            // 'category_id' => 'required',
            // 'description' => 'required',
            // 'price'       => 'required',
            // 'in_stock    '=> 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $request = request()->all();


        if(isset($request['cover_image'])){
            $request['cover_image'] = Storage::put('products',$request['cover_image']);
        }

        $request['characteristics']=[
            'color'    =>request()->color??'',
            'dimensions'=>request()->dimensions??'',
            'material' =>request()->material??''
        ];


        if(request()->hasFile('product_images')){
            $product->images()->delete();
            $files = request()->file('product_images');
            foreach ($files as $file){
                $file_path = Storage::put('products',$file);
                $image = $product->images()->create([
                    'path' => $file_path,
                    'type' => "normal",

                ]);

                $product->images()->save($image);
             }
        }

        $product->fill($request)->save();

        session()->flash('message', 'Product Updated');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('message', 'Product Deleted');
        return redirect()->route('admin.products.index');
    }

    protected function applyFilters($products)
    {
        $products = $this->handleSearchKeys($products);

        if (request('category'))
            $products->where('category_id', request('category'));

        if (request('color'))
            $products->where('characteristics', 'like', '%' . request('color') . '%');

        if (request('max_price'))
            $products->where('price', '<=', request('max_price'));

        if (request('min_price'))
            $products->where('price', '>=', request('min_price'));

        if (request('order_by') == 'popularity')
            $products->orderBy('sales_count', 'desc');

        return $products;
    }

    protected function getProductQuery()
    {
        if (auth()->user() && request('order_by') == 'favourites')
            return auth()->user()->favourites();

        return Product::latest();
    }

    protected function handleSearchKeys($products)
    {
        $search_key = request('search_key');
        if ($search_key) {
            return $products->where(function ($query) use ($search_key) {
                $query->orWhere('name', 'like', '%' . $search_key . '%')
                    ->orWhere('description', 'like', '%' . $search_key . '%')
                    ->orWhere('characteristics', 'like', '%' . $search_key . '%');
            });

        }
        return $products;
    }
}
