<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    public function index(): View
    {
         $logs = StockLog::with('product')->latest()->paginate(20);
         return view('stocks.index', compact('logs'));
    }

    public function create(): View
    {
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($validated['type'] === 'in') {
            $product->increment('stock', $validated['quantity']);
        } else {
             if ($product->stock < $validated['quantity']) {
                 return back()->withErrors(['quantity' => 'Stok tidak mencukupi!']);
             }
            $product->decrement('stock', $validated['quantity']);
        }

        StockLog::create($validated);

        return redirect()->route('products.index')->with('success', 'Stok berhasil diperbarui.');
    }
}
