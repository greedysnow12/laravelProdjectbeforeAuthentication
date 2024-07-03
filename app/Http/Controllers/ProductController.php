<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::oldest()->paginate(3); //or latest()

        return view('products.index', compact('products'))->with(request()->input('page'));
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function exam()
    {

        return view('products.exam', compact('products'))->with(request()->input('page'));
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the input "input-ээ баталгаажуулах"
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
        // create a new product in the database
        Product::create($request->all());

        // redirect the user and send friendly message "ахин чиглүүлэх хэрэглэгчийн илгээх friendly message"
        return redirect()->route('products.index')->with('success', 'product created successfully');
    }
   

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('products.show', compact('product'))->with(request()->input('page'));        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
            // validate the input "input-ээ баталгаажуулах"
            $request->validate([
                'name' => 'required',
                'detail' => 'required'
            ]);
            // create a new product in the database
            $product->update($request->all());
    
            // redirect the user and send friendly message "ахин чиглүүлэх хэрэглэгчийн илгээх friendly message"
            return redirect()->route('products.index')->with('success', 'product updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // DELETE the product
        $product->delete();

        // redirect the user and displaye success message
        return redirect()->route('products.index')->with('success','product deleted successfully');
        
    }
}
