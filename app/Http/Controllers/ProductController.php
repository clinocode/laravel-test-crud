<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view ('pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' =>'required',
            'uom_id' =>'required' ,
            'brand_id' =>'required',
            'name' =>'required',
            'description' =>'required',
            'condition' =>'required',
            'price' =>'required',
            'stock' =>'required',
            'is_active' =>'required',
            'discount' =>'required',
            'default_image'=>'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);


        $file = $request->default_image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $path = 'images/';
        $file->move($path, $filename);



        Product::create([
            'category_id' => $request->category_id,
            'uom_id' => $request->uom_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active,
            'discount' => $request->discount,
            'default_image'=> $path.$filename
        ]);

        return redirect()->route('product.index')->with('success', 'product telah berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' =>'required',
            'uom_id' =>'required' ,
            'brand_id' =>'required',
            'name' =>'required',
            'description' =>'required',
            'condition' =>'required',
            'price' =>'required',
            'stock' =>'required',
            'is_active' =>'required',
            'discount' =>'required',
            'default_image'=>'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        if($request->has('default_image')) {
            
            $file = $request->default_image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $path = 'images/';
            $file->move($path, $filename);

            if(File::exists($product->default_image)){
                File::delete($product->default_image);
            }
        }

       

        $product->update([
            'category_id' => $request->category_id,
            'uom_id' => $request->uom_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active,
            'discount' => $request->discount,
            'default_image'=> $path.$filename
        ]);

        return redirect()->route('product.index')->with('success', 'product telah berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'product telah berhasil di hapus');
    }
}
