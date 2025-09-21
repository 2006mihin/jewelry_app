<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // --- Admin CRUD ---

    // Display all products in admin panel
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        // Default values for Blade
        $editing = false;
        $productToEdit = null;

        if ($request->has('edit')) {
            $productToEdit = Product::find($request->edit);
            if ($productToEdit) {
                $editing = true;
            }
        }

        return view('admin.adminproducts', compact('products', 'categories', 'editing', 'productToEdit'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    // --- Public Product Pages ---

    public function rings()
    {
        $category = Category::where('name', 'Rings')->firstOrFail();
        $products = $category->products()->get();
        return view('products.rings', compact('products'));
    }

    public function pendants()
    {
        $category = Category::where('name', 'Pendants')->firstOrFail();
        $products = $category->products()->get();
        return view('products.pendants', compact('products'));
    }

    public function earrings()
    {
        $category = Category::where('name', 'Earrings')->firstOrFail();
        $products = $category->products()->get();
        return view('products.earrings', compact('products'));
    }

    public function bracelets()
    {
        $category = Category::where('name', 'Bracelets')->firstOrFail();
        $products = $category->products()->get();
        return view('products.bracelets', compact('products'));
    }

    // Optional: add to cart
    public function addToCart(Request $request)
    {
        // Implement your add-to-cart logic here
    }
}
