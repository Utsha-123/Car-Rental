<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Facades\ImageFacade;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = Category::all();
        return view('admin.product.products', compact('products', 'data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'categories' => 'required|exists:categories,id',
            'product_images' => 'required|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
        ]);
    // dd($request->all());
        // $imagePaths = [];
        // if ($request->hasFile('product_images')) {
        //     foreach ($request->file('product_images') as $image) {
                
        //         $path = $image->store('products', 'public');
        //         $imagePaths[] = $path;
        //     }
        // }

        $uploadedFiles = $request->file('product_images');
        // dd($uploadedFiles);
        if (!is_array($uploadedFiles)) {
            $uploadedFiles = [$uploadedFiles];
        }
        $storedFiles = ImageFacade::storeImages($uploadedFiles, 'products');
    
        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->categories,
            'stock' => $request->stock,
            'discounted_price' => $request->discount,
            'product_image' => json_encode($storedFiles), 
        ]);

    
        return redirect()->route('product')->with('success', 'Product created successfully.');

    } catch (\Exception $e) {
        dd($e->getFile(),$e->getMessage(),$e->getLine());
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'product_images' => 'nullable|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
try{
    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;


    // Check if new images are uploaded
    // if ($request->hasFile('product_images')) {
    //     $imagePaths = [];
    //     foreach ($request->file('product_images') as $image) {
    //         $path = $image->store('products', 'public');
    //         $imagePaths[] = $path;
    //     }
    //     $product->product_image = json_encode($imagePaths); // Update JSON data
    // }
    if($request->hasFile('product_image')){
       
        try{
            if($product->product_image){
            ImageFacade::deleteImages($product->product_image);
        }
            $storedFiles = ImageFacade::storeImages($request->file('product_image'), 'products');
        }catch(\Exception $e){
            return;
        }
        $product->product_image = $storedFiles;
    }
   $product->save();

            return redirect()->route('product')->with('success', 'Product updated successfully.');
        }
catch (Exception $e) {
   dd($e->getMessage(),$e->getLine(),$e->getFile());
    return redirect()->route('product')->with('error', 'Unable to update the product. Please try again later.');
}
      
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function delete(int $id)
    {
        Product::destroy($id);
        return redirect()->route('product')->with('status', 'Product Delete');
    }

    public function availableCars(Request $request)
{
    $startDate = $request->start_date ?? now();
    $endDate = $request->end_date ?? now()->addDays(1);

    $vehicles = Product::all()->filter(function ($vehicle) use ($startDate, $endDate) {
        return $vehicle->isAvailable($startDate, $endDate);
    });

    return view('available_cars', compact('vehicles', 'startDate', 'endDate'));
}

}