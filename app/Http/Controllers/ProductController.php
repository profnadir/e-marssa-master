<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Jobs\ProductCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'products' => auth()->user()->products()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string|max:255',
            'file' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
 
        $product = $request->user()->products()->create($validated);

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();

            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $product->file_path = $filePath;
            $product->save();
        }

        ProductCreated::dispatch($product);


 
        return redirect(route('products.index'))->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
 
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
 
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string|max:255',
            'file' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
 
        $product->update($validated);

        if($request->file()) {
            if($product->file_path) {
                //dd($product->file_path);
                //Storage::disk('public')->exists('uploads/1679872887_pexels-fox-213399.jpg') ? dd('ok') : dd('ko');

                if(Storage::disk('public')->delete($product->file_path)){
                    $fileName = time().'_'.$request->file->getClientOriginalName();

                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

                    $product->file_path = $filePath;
                    $product->save();
                }
            }else{
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $product->file_path = $filePath;
                $product->save();
            }
        }
 
        return redirect(route('products.index'))->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
 
        Storage::disk('public')->delete($product->file_path);

        $product->delete();

        return redirect(route('products.index'))->with('success', 'Product deleted successfully.');;
    }
}
